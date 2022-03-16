var refresh;
refresh = setInterval(cekUpdate, 1000);

function sendMessage(name){
  ///console.log($('#photo')[0]);
  //var formData = new FormData();
  //formData.append('file', $('#photo')[0].files[0]);
  $.post("process.php",
  {
    name: $("#name").val(),
    message: $("#message").val(),
    locate: $("#locate").val(),
    id: $("#id").val(),
    sticker: ""
  },
  function(data, status){
    document.getElementById("message").value = "";
    if (status == "success") {
      //refresh = setInterval(cekUpdate, 1000);
    }
   console.log("Data: " + data + "\nStatus: " + status);
  });
}
function stickerSelectHandle(source){
  $.post("process.php",
  {
    name: $("#name").val(),
    message: "",
    locate: "",
    id: $("#id").val(),
    sticker: source,
  },
  function(data, status){
    document.getElementById("message").value = "";
    if (status == "success") {
      //refresh = setInterval(cekUpdate, 1000);
    }
   console.log("Data: " + data + "\nStatus: " + status);
  });
  hideAnu(document.querySelector("#anu"));
}
var total_ = total;
var c_day = [];
var i_date;
function cekUpdate(){
  $.getJSON("data.json",function(res){
    $(`#root_1 .message, #root_2 .message`).remove();
    $(`#root_1 .date-messages, #root_2 .date-messages`).remove();
    
    res.data.forEach((d, i) => {
      let name = d.name;
      let date = d.date;
      let date2 = d.date2;
      let photo = d.photo;
      let sticker = d.sticker;
      let file = d.filepath;
      let audio = d.audio;
      let video = d.video;
      let locate = d.locate;
      let filename = d.filename;
      let time_post = new Date(date).getTime();
      let timeNow = new Date().getTime();
      let selisihWaktu = timeNow - time_post;
      var day = Math.round(selisihWaktu / (1000 * 60 * 60 * 24));
      let msg = d.message.toString().split("\n").join("<br/>");
      let dir = "./upload/";
      let id = d.id;
      let whoIsThis = "another";
      let avatar = d.avatar;
      if (avatar == null) {
        avatar = "avatar.png";
      }
      /* */
      if (id == ip_user) {
        whoIsThis = "you";
        name = "you";
      }
     /* logic for identify special message */
     let kataTerlarang = ["kontol","memek","asu","anjing","titit","vagina","nekopoi","mengontol","asu","babi","meki","dick","pussy","bunuh","narkoba","seks","xnxx","xxx","bokep","bokeh","kucingpoi","doujin","sex","hentai","gendeng","gila","konsolodon","segs","ewe","jembut","jembot","cok","kerek","cuk","cox",];
      kataTerlarang.forEach((kata) => {
        msg = msg.toLowerCase();
        msg = msg.split(kata).join(sensor(kata.length));
     })
      if(day >= 1){
        /* message yesterday handle */
      }
      if (day == 0) {
        $(".date-message").remove();
        $("#root_2").append(`<div id="date_${i}" class="date-messages"><hr /> <span>${date_now} | Today</span> <hr /></div>`);
        c_day.push(i);
        if(photo != undefined || sticker != undefined){
          photo == undefined ? photo = sticker : sticker = photo
          $("#root_2").append(`<div class="message ${whoIsThis} "><a href="/user?name=${encodeURI(d.name)}"><div class="avatar"><img class="" src="${avatar}" alt="${name}" /></div></a><div class="information"><div class="user-detail"><p class="username ${whoIsThis}">${name} </p><p class="date">${date}</p></div>
          <img onerror="errorImage(this)" class="photo-upload" onclick="srcPhoto(this)" src="${photo}"/>
          <p class="msg ${whoIsThis}">${msg}</p></div></div>`);
        } else if(video != undefined){
          $("#root_2").append(`<div class="message ${whoIsThis} "><a href="/user?name=${encodeURI(d.name)}"><div class="avatar"><img class="" src="${avatar}" alt="${name}" /></div></a><div class="information"><div class="user-detail"><p class="username ${whoIsThis}">${name} </p><p class="date">${date}</p>
            </div>
             <div class="message-video" id="player_${i}">
             <i onclick="render_video(${i},'${video}'); playVideo(this,${i},'${video}')" class="bi bi-play-fill"></i>
             </div>
            <p class="msg ${whoIsThis}"><a style="color:#fff;" href="${video}"><i class="bi bi-download"> download</i></a>
            <br/>${msg}</p></div></div>`);
        } else if(audio != undefined) {
          $("#root_2").append(`<div class="message ${whoIsThis} "><a href="/user?name=${encodeURI(d.name)}"><div class="avatar"><img class="" src="${avatar}" alt="${name}" /></div></a><div class="information"><div class="user-detail"><p class="username ${whoIsThis}">${name} </p><p class="date">${date}</p></div>
          <audio id="audio_${i}" onplay="MediaOn()" onended="MediaOff()" onpause="MediaOff()" src="${audio}"></audio>
          <div class="message-audio">
          <span onclick="playAudio(this,${i})" class="bi bi-play-fill audio-control">
          </span>
          <p>${filename}</p>
          </div>
          <p class="msg ${whoIsThis}">${msg}</p></div></div>`);
        } else if(file != undefined){
          $("#root_2").append(`<div class="message ${whoIsThis} "><a href="/user?name=${encodeURI(d.name)}"><div class="avatar"><img class="" src="${avatar}" alt="${name}" /></div></a><div class="information"><div class="user-detail"><p class="username ${whoIsThis}">${name} </p><p class="date">${date}</p></div><a target="_blank" href="/file.php?id=${file.split(dir).join("")}"><div class="message-file"><span class="icon-file"></span><p>${filename}</p></div></a><p class="msg ${whoIsThis}">${msg}</p></div></div>`);
        } else if(locate != undefined){
          $("#root_2").append(`<div class="message ${whoIsThis} "><a href="/user?name=${encodeURI(d.name)}"><div class="avatar"><img class="" src="${avatar}" alt="${name}" /></div></a><div class="information"><div class="user-detail"><p class="username ${whoIsThis}">${name} </p><p class="date">${date}</p></div>
          <div class="message-location">
           <a title="I'm here.." href="${locate}">My Locate</a>
          </div>
          </div></div>`);
        } else {
          $("#root_2").append(`<div class="message ${whoIsThis} "><a href="/user?name=${encodeURI(d.name)}"><div class="avatar"><img class="" src="${avatar}" alt="${name}" /></div></a><div class="information"><div class="user-detail"><p class="username ${whoIsThis}">${name} </p><p class="date">${date}</p></div><p class="msg ${whoIsThis}">${msg}</p></div></div>`);
        }
        $(`#date_${i}:not(#date_${c_day[0]})`).remove();
      }
    })
  })
  //$("video, audio").remove();
}


function render_video(index,path){
  let i = index;
  $(`#player_${i}`).append(`<video id="vid_${i}" class="video-player" onplay="MediaOn()" onended="MediaOff()" onpause="MediaOff()" type="video/mp4" src="${path}"></video>`);
  
}
function errorImage(e){
  $(e).attr("src","https://101red.com/prime/wp-content/uploads/2021/03/24-Error-404-Not-Found-Apa-Artinya-serta-Gimana-Metode-Mengatasinya.jpg");
}
function fileHandle(self){
  //let p = document.querySelector("#photo");
  if($(self).val() !== null){
  let select = $(self).attr("name");
   // document.getElementById("message").value = $(self).val();
   let filename = $(self).val().replace(/C:\\fakepath\\/i, '');
    $(".controller").append(`<div class="HasSelect">
    selected ${filename}
    </div>`)
    //$("#message").attr("required",false);
    $("#form").attr("onsubmit","");
    $("#form").attr("action","process.php");
    $("#btn").attr("type","submit");
    $("#btn").attr("onclick","");
    hideAnu(document.querySelector("#anu"));
    console.log("file handle √")
  }
}

function addMedia() {
  $(".controller .HasSelect").remove();
  $(".container").append(`<div id="anu" onclick="hideAnu(this)"></div>`);
  $(".container").append(`<div class="multimedia" id="addMedia">
  <h4 class="text">select media</h4>
  <div class="content">
    <div>
    <label onclick="resetValueInput()" class="item-addMedia" for="photo" id="btn-photo"></label>
    <label onclick="resetValueInput()" class="item-addMedia" for="file" id="btn-file"></label>
    </div>
    <div>
    <label onclick="resetValueInput()" class="item-addMedia" for="audio" id="btn-audio"></label>
    <label onclick="resetValueInput()" class="item-addMedia" for="video" id="btn-video"></label>
    </div>
    <div>
    <label onclick="resetValueInput();getLocate('locate')" class="item-addMedia" id="btn-locate"></label>
    <label id="btn-sticker" onclick="resetValueInput();addMediaSticker()" class="item-addMedia"></label>
    </div>
  </div>
  </div>`);
  setTimeout(function() {
    $("#addMedia").css("transform","translateY(0%)");
  }, 100);
}
function addMediaSticker(){
  $("#addMedia").remove();
  $(".container").append(`<div class="multimedia" id="addMediaSticker" oncontextmenu="return false" onselectstart="return false" onpaste="return false;" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" >
  <h4 class="text">select sticker</h4>
  <div class="content" id="stick1"></div>
  </div>`);
  for(let i = 2; i < dataList_sticker.length; i++){
    let stiker = dataList_sticker[i];
    $("#stick1").append(`<img onclick="sendSticker(this)" src="./list-sticker/${stiker}" />`)
  }
  $("#addMediaSticker").css("transform","translateY(0)");
}
function sendSticker(self){
  let stick = $(self).attr("src");
  stickerSelectHandle(stick);
}
function getLocate(e){
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(getPosition);
  }
}
function getPosition(position){
  let latitude = position.coords.latitude;
  let longitude = position.coords.longitude;
  let userPositionData = `geo:${latitude},${longitude}?z=3`;
  let userPositionMsg = `latitude : ${latitude}\nlongitude :${longitude}`;
  $(`#locate`).attr("value",`${userPositionData}`);
  document.querySelector("#message").value = userPositionMsg;
  hideAnu(document.querySelector("#anu"))
  console.log(userPosition)
}
function resetValueInput(){
  document.querySelectorAll(`#form input[type="file"]`).forEach((e,i) => {
    e.value=null;
    console.log(e);
  })
}
function hideAnu(self){
  $(self).remove();
  $(".multimedia").css("transform","translateY(200%)");
  setTimeout(function() {
  $(".multimedia").remove();
  }, 500);
}
function MediaOn(){
  clearInterval(refresh);
  console.log("refresh frezed")
}
function MediaOff(){
  refresh = setInterval(cekUpdate, 1000);
}
function playAudio(e,i){
  $(e).toggleClass("bi-play-fill");
  $(e).toggleClass("bi-pause-fill");
  $(e).attr("onclick",`pauseAudio(this, ${i})`);
  document.getElementById(`audio_${i}`).play();
}
function pauseAudio(e,i){
  $(e).toggleClass("bi-play-fill");
  $(e).toggleClass("bi-pause-fill");
  $(e).attr("onclick",`playAudio(this, ${i})`);
  document.getElementById(`audio_${i}`).pause();
}
function playVideo(e,i, video){
  $(e).toggleClass("bi-play-fill");
  $(e).toggleClass("bi-pause-fill");
  $(e).attr("onclick",`pauseVideo(this, ${i},'${video}')`);
  document.getElementById(`vid_${i}`).play();
}
function pauseVideo(e,i,video){
  $(e).toggleClass("bi-play-fill");
  $(e).toggleClass("bi-pause-fill");
  $(e).attr("onclick",`render_video(${i},'${video}');playVideo(this, ${i}, '${video}')`);
  document.getElementById(`vid_${i}`).pause();
  document.getElementById(`vid_${i}`).remove();
}
function srcPhoto(self){
  window.location.href=$(self).attr("src");
}
function sensor(each){
  let specialChars = "*";
  let sensor = ""
  for (var i = 0; i < each; i++) {
    sensor += specialChars;
  }
  return sensor
}

