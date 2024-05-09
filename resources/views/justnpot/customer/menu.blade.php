<style>
    * {
  box-sizing: border-box;
}

body,
html {
  overflow-x: hidden;
}

body {
  margin: 0;
  width: 100%;
  font-family: "Oswald", sans-serif;
  font-size: 12pt;
  font-weight: 400;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Bebas Neue", cursive;
}

a {
  text-decoration: none;
  transition: all 0.5s ease-in-out;
}

a:hover {
  transition: all 0.5s ease-in-out;
}

.we-are-block {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  flex-wrap: nowrap;
  width: 100%;
  height: 900px;
}

@media screen and (max-width: 860px) {
  .we-are-block {
    height: 2200px;
  }
}

@media screen and (max-width: 500px) {
  .we-are-block {
    height: 2300px;
  }
}

#about-us-section {
  background: #0c4c91;
  width: 100%;
  height: 50%;
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  position: relative;
}

@media screen and (max-width: 860px) {
  #about-us-section {
    flex-direction: column;
    justify-content: space-between;
  }
}

.about-us-image {
  position: absolute;
  top: 0;
  right: 0;
  height: 100%;
  overflow: hidden;
}

@media screen and (max-width: 860px) {
  .about-us-image {
    position: relative;
    width: 100%;
    height: 45%;
  }
}

@media screen and (max-width: 747px) {
  .about-us-image {
    height: 35%;
  }
}

@media screen and (max-width: 644px) {
  .about-us-image img {
    position: absolute;
    left: -220px;
  }
}

.about-us-info {
  display: flex;
  flex-direction: column;
  align-items: flex-end;
  justify-content: space-evenly;
  width: 40%;
  height: 80%;
  margin-right: 850px;
  margin-left: 12px;
  z-index: 2;
}

@media screen and (max-width: 1353px) {
  .about-us-info {
    margin-right: 400px;
    width: 60%;
    background: #0c4c9199;
    padding: 0px 25px 0px 0px;
  }
}

@media screen and (max-width: 1238px) {
  .about-us-info {
    margin-right: 340px;
    width: 100%;
  }
}

@media screen and (max-width: 1111px) {
  .about-us-info {
    margin-right: 270px;
  }
}

@media screen and (max-width: 910px) {
  .about-us-info {
    margin-right: 150px;
  }
}

@media screen and (max-width: 860px) {
  .about-us-info {
    margin: 0px 0px 0px 0px !important;
    padding: 0px 20px 0px 20px !important;
    width: 100%;
    height: 55%;
    align-items: center;
  }
}

@media screen and (max-width: 747px) {
  .about-us-info {
    height: 65%;
  }
}

.about-us-info h2 {
  color: white;
  font-size: 40pt;
  text-align: right;
}

@media screen and (max-width: 860px) {
  .about-us-info h2 {
    text-align: center;
  }
}

.about-us-info p {
  color: white;
  font-size: 14pt;
  text-align: right;
}

@media screen and (max-width: 860px) {
  .about-us-info p {
    text-align: center;
  }
}

.about-us-info a {
  background-color: white;
  color: #0c4c91;
  width: 180px;
  text-align: center;
  padding: 15px 0px 15px 0px;
  font-size: 14pt;
  box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}

.about-us-info a:hover {
  background: #404140;
  color: white;
  box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
  transform: translateY(10px);
}

#history-section {
  width: 100%;
  height: 50%;
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  align-items: center;
  justify-content: center;
  position: relative;
}

@media screen and (max-width: 860px) {
  #history-section {
    flex-direction: column;
    justify-content: space-between;
  }
}

.history-image {
  position: absolute;
  top: 0;
  left: 0;
  max-width: 820px;
  height: 100%;
  overflow: hidden;
}

@media screen and (max-width: 860px) {
  .history-image {
    position: relative;
    width: 100%;
    height: 40%;
  }
}

@media screen and (max-width: 747px) {
  .history-image {
    height: 35%;
  }
}

@media screen and (max-width: 644px) {
  .history-image img {
    position: absolute;
    right: -220px;
  }
}

.history-info {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  justify-content: space-evenly;
  width: 40%;
  height: 80%;
  margin-left: 850px;
  margin-right: 12px;
  z-index: 2;
}

@media screen and (max-width: 1353px) {
  .history-info {
    margin-left: 400px;
    width: 60%;
    background: #ffffff99;
    padding: 0px 0px 0px 25px;
  }
}

@media screen and (max-width: 1238px) {
  .history-info {
    margin-left: 340px;
    width: 100%;
  }
}

@media screen and (max-width: 1111px) {
  .history-info {
    margin-left: 270px;
  }
}

@media screen and (max-width: 910px) {
  .history-info {
    margin-left: 150px;
  }
}

@media screen and (max-width: 860px) {
  .history-info {
    margin: 0px 0px 0px 0px !important;
    padding: 0px 40px 0px 40px !important;
    width: 100%;
    height: 60%;
    align-items: center;
  }
}

@media screen and (max-width: 747px) {
  .history-info {
    height: 65%;
  }
}

.history-info h2 {
  color: #0c4c91;
  font-size: 40pt;
  text-align: left;
}

@media screen and (max-width: 860px) {
  .history-info h2 {
    text-align: center;
  }
}

.history-info p {
  color: #0c4c91;
  font-size: 14pt;
  text-align: left;
}

@media screen and (max-width: 860px) {
  .history-info p {
    text-align: center;
  }
}

.history-info a {
  background-color: #0c4c91;
  color: white;
  width: 180px;
  text-align: center;
  padding: 15px 0px 15px 0px;
  font-size: 14pt;
  box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
}

.history-info a:hover {
  background: #404140;
  color: white;
  box-shadow: rgba(0, 0, 0, 0.56) 0px 22px 70px 4px;
  transform: translateY(10px);
}

</style>
<div class="we-are-block">

    <div id="about-us-section" style=" background-image: linear-gradient( rgb(30, 0, 161),rgb(54, 135, 211));
    ">

      <div class="about-us-image">

        <img src="{{ asset('img/about1.jpg') }}" width="808" height="458" alt="Lobby Image">

      </div>

      <div class="about-us-info" >

        <h2>Mission</h2>

        <p>We intend for a better career for Filipino Graphic Artists to showcase their artwork, and masterpieces and be able to boost their confidence, and give inspiration to other people with their co-artists. </p>

        {{-- <a href="#" title="About Us Button">ABOUT US</a> --}}

      </div>

    </div>

    <div id="history-section" >

      <div class="history-image">

        <img src="{{ asset('img/about3.jpg') }}" width="951" height="471" alt="Building Pic" >

      </div>

      <div class="history-info">

        <h2>Vision</h2>

        <p>Through the publication of their artworks will help them to gain profit and can contribute artworks to society. </p>

        {{-- <a href="#" title="History Button">HISTORY</a> --}}

      </div>

    </div>

  </div>


