<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hardware extends CI_Controller
{
  public function update()
  {
    $this->load->model('Kontrol_model', 'kontrol');
    $action = $id = $name = $gpio = $state = "";

    if ($_SERVER["REQUEST_METHOD"] == "GET") 
    {
      $action = htmlspecialchars($this->input->get('action'));
      if ($action == "outputs_state") 
      {
        $board = htmlspecialchars($this->input->get('board'));
        $result = $this->kontrol->getAllOutputStates($board);
        if($result) 
        {
          foreach($result as $row)
          {
            $rows[$row["gpio"]] = $row["state"];
          }
        }
        echo json_encode($rows);
        $result = $this->kontrol->getBoard($board);
        if($result)
        {
          $this->kontrol->updateLastBoardTime($board);
        }
      }
      else if ($action == "output_update") 
      {
        $id = htmlspecialchars($this->input->get('id'));
        $state = htmlspecialchars($this->input->get('state'));
        $result = $this->kontrol->updateOutput($id, $state);
        echo $result;
      }
      else if ($action == "output_delete") 
      {
        $id = htmlspecialchars($this->input->get('id'));
        $board = $this->kontrol->getOutputBoardById($id);
        if ($row = $board->fetch_assoc()) 
        {
          $board_id = $row["board"];
        }
        $result = $this->kontrol->deleteOutput($id);
        $result2 = $this->kontrol->getAllOutputStates($board_id);
        if(!$result2->fetch_assoc()) 
        {
          $this->kontrol->deleteBoard($board_id);
        }
        echo $result;
      }
      else 
      {
        echo "Invalid HTTP request.";
      }
    }
  }
}

