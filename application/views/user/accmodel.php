<div class="topnav">
  <h1><i class="far fa-compass"></i> MPU6050 <i class="far fa-compass"></i></h1>
</div>
<div class="content">
  <div class="cards">
    <div class="card">
      <p class="card-title">GYROSCOPE</p>
      <p><span class="reading">X: <span id="gyroX"></span> rad</span></p>
      <p><span class="reading">Y: <span id="gyroY"></span> rad</span></p>
      <p><span class="reading">Z: <span id="gyroZ"></span> rad</span></p>
    </div>
    <div class="card">
      <p class="card-title">ACCELEROMETER</p>
      <p><span class="reading">X: <span id="accX"></span> ms<sup>2</sup></span></p>
      <p><span class="reading">Y: <span id="accY"></span> ms<sup>2</sup></span></p>
      <p><span class="reading">Z: <span id="accZ"></span> ms<sup>2</sup></span></p>
    </div>
    <div class="card">
      <p class="card-title">TEMPERATURE</p>
      <p><span class="reading"><span id="temp"></span> &deg;C</span></p>
      <p class="card-title">3D ANIMATION</p>
      <button id="reset" onclick="resetPosition(this)">RESET POSITION</button>
      <button id="resetX" onclick="resetPosition(this)">X</button>
      <button id="resetY" onclick="resetPosition(this)">Y</button>
      <button id="resetZ" onclick="resetPosition(this)">Z</button>
    </div>
  </div>
  <div class="cube-content">
    <div id="3Dcube"></div>
  </div>
</div>