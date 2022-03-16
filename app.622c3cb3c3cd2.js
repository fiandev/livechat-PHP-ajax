const dataList_sticker = [".","..","1f302.svg","1f31c.svg","1f31d.svg","1f31e.svg","1f31f.svg","1f324.svg","1f325.svg","1f326.svg","1f327.svg","1f329.svg","1f331.svg","1f332.svg","1f333.svg","1f334.svg","1f335.svg","1f336.svg","1f337.svg","1f338.svg","1f339.svg","1f33a.svg","1f33b.svg","1f33c.svg","1f33e.svg","1f33f.svg","1f340.svg","1f341.svg","1f342.svg","1f343.svg","1f344.svg","1f345.svg","1f34c.svg","1f34d.svg","1f352.svg","1f353.svg","1f355.svg","1f356.svg","1f357.svg","1f366.svg","1f368.svg","1f36c.svg","1f36d.svg","1f370.svg","1f372.svg","1f377.svg","1f378.svg","1f379.svg","1f37a.svg","1f37c.svg","1f37e.svg","1f37f.svg","1f380.svg","1f381.svg","1f382.svg","1f383.svg","1f384.svg","1f388.svg","1f389.svg","1f38a.svg","1f393.svg","1f396.svg","1f397.svg","1f399.svg","1f3a9.svg","1f3b6.svg","1f3bd.svg","1f3c0.svg","1f3c1.svg","1f3c5.svg","1f3c6.svg","1f3c8.svg","1f3c9.svg","1f3d0.svg","1f3e0.svg","1f3f7.svg","1f3fa.svg","1f40a.svg","1f40b.svg","1f40c.svg","1f40d.svg","1f419.svg","1f41b.svg","1f41c.svg","1f41d.svg","1f41e.svg","1f41f.svg","1f420.svg","1f421.svg","1f422.svg","1f423.svg","1f425.svg","1f428.svg","1f42c.svg","1f42d.svg","1f42e.svg","1f42f.svg","1f430.svg","1f431.svg","1f433.svg","1f435.svg","1f436.svg","1f437.svg","1f438.svg","1f439.svg","1f43a.svg","1f43b.svg","1f43c.svg","1f43d.svg","1f43e.svg","1f440.svg","1f441.svg","1f442.svg","1f443.svg","1f444.svg","1f445.svg","1f446.svg","1f44c.svg","1f44d.svg","1f44e.svg","1f451.svg","1f452.svg","1f453.svg","1f455.svg","1f456.svg","1f457.svg","1f459.svg","1f45a.svg","1f479.svg","1f47b.svg","1f47d.svg","1f47e.svg","1f47f.svg","1f480.svg","1f489.svg","1f48b.svg","1f490.svg","1f493.svg","1f494.svg","1f495.svg","1f496.svg","1f497.svg","1f498.svg","1f499.svg","1f49a.svg","1f49b.svg","1f49c.svg","1f49d.svg","1f49e.svg","1f4a1.svg","1f4a4.svg","1f4a5.svg","1f4a6.svg","1f4a7.svg","1f4a8.svg","1f4a9.svg","1f4ab.svg","1f4b0.svg","1f4f5.svg","1f512.svg","1f51e.svg","1f525.svg","1f56f.svg","1f576.svg","1f577.svg","1f578.svg","1f590.svg","1f595.svg","1f596.svg","1f5ef.svg","1f600.svg","1f608.svg","1f60a.svg","1f60b.svg","1f60c.svg","1f60d.svg","1f60e.svg","1f60f.svg","1f618.svg","1f61a.svg","1f61b.svg","1f61c.svg","1f61d.svg","1f61e.svg","1f61f.svg","1f621.svg","1f624.svg","1f62a.svg","1f62b.svg","1f62c.svg","1f62d.svg","1f62e.svg","1f62f.svg","1f631.svg","1f636.svg","1f644.svg","1f648.svg","1f649.svg","1f64a.svg","1f680.svg","1f6ac.svg","1f6bf.svg","1f910.svg","1f911.svg","1f916.svg","1f918.svg","1f950.svg","1f952.svg","1f955.svg","1f956.svg","1f95b.svg","1f980.svg","1f981.svg","1f982.svg","1f987.svg","1f989.svg","1f98b.svg","1f98c.svg","1f9c0.svg","23f0.svg","2600.svg","2601.svg","2602.svg","2603.svg","2614.svg","2618.svg","261d.svg","2620.svg","2660.svg","2663.svg","2665.svg","2666.svg","2693.svg","26a1.svg","26bd.svg","26be.svg","26c4.svg","26c5.svg","26c8.svg","26d1.svg","2708.svg","270c.svg","2728.svg","2744.svg","2753.svg","2757.svg","2763.svg","2764.svg","2b50.svg","avatar.png","clockDarkTheme.svg","clockLightTheme.svg","e001.svg","e002.svg","e003.svg","e022.svg","e04e.svg","e04f.svg","e05a.svg","e11b.svg","e11c.svg","e335.svg","e41c.svg","ic_content_sticker_location.svg","ic_content_sticker_location_60_percent_black.svg","ic_content_sticker_location_black.svg"]; $('#root').append(`<div class='container'> <h1 class='title-top'>live chat</h1> <div class='message-container' id='root_1'></div> <div class='message-container' id='root_2'> <div id='date' class='date-message'><hr /> <span>No Message</span> <hr /></div> </div> <div class='controller'> <div class='plus-item' onclick='addMedia()'> </div> <form onsubmit='return false' method='post' enctype='multipart/form-data' id='form' accept-charset='utf-8'> <textarea type='text' name='message' id='message' class='input' placeholder='type message..' value=''></textarea> <input type='hidden' name='name' id='name' value='Ryuu13~4852' /> <input type='hidden' name='id' id='id' value='127.0.0.1' /> <input onchange='fileHandle(this)' type='file' style='display:none;' name='photo' id='photo' value='' accept='image/*' /> <input onchange='fileHandle(this)' type='file' style='display:none;' name='file' id='file' value='' /> <input accept='audio/*' onchange='fileHandle(this)' type='file' style='display:none;' name='audio' id='audio' value='' /> <input type='text' style='display:none;' name='locate' id='locate' value='' /> <input accept='video/mp4,video/x-m4v,video/*' onchange='fileHandle(this')' type='file' style='display:none;' name='video' id='video' value='' /> <button id='btn' type='button' onclick='sendMessage()'>send</button> </form> </div>`);var total = 284,ip_user = '127.0.0.1',date_now = 'Mar 12, 2022';$.getScript('script.js');$.getScript('close.js');