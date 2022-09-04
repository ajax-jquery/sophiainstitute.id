---
layout: post
title: Tentang Kami
---

Sophia Institute merupakan komunitas epistemik dan nonprofit yang bergelut dalam bidang literasi dan kajian mendalam mengenai berbagai persoalan yang berkenaan dengan studi kefilsafatan dan—juga dalam berbagai aspeknya yang didirikan pada 4 September 2020.

Sebelumnya, komunitas ini bernama Lingkar Studi Filsafat (LSF) Sophia. Namun karena suatu pertimbangan dan juga beberapa perombakan sistem yang kami canangkan di dalamnya, maka sebulan pasca milad pertama LSF Sophia tepatnya pada Hari Filsafat Dunia 18 November 2021, kami mengubah nama "Lingkar Studi Filsafat (LSF) Sophia" menjadi "Sophia Institute." [Selengkapnya..](https://www.sophiainstitute.id/p/tentang-kami.html)











     

<style>

.generator-gdrive {

    position: relative;

    display: block;

    margin: auto;

    padding: 20px 0;

    max-width: 800px;

    text-align: center;

    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";

    line-height: 1.5;

}

.form-gdrive {

    position: relative;

    display: block;

    margin: 5px 0;

    padding: 10px;

    width: calc(100% - 20px);

}

.form-gdrive.output, .tombol-copy-reset {

    display: none;

}

.form-gdrive label {

    position: relative;

    display: block;

    margin: 20px 0;

    font-size: 16px;

    font-weight: 600;

    color: #444;

}

.form-gdrive span {

    position: relative;

    display: block;

    margin-bottom: 10px;

    font-size: 12px;

    color: #444;

}  

.form-gdrive input {

    position: relative;

    display: block;

    margin: auto;

    padding: 10px 15px;

    width: calc(100% - 30px);

    background: #ebeff3;

    color: #444;

    border: none;

    outline: none;

    border-radius: 5px;

}

.form-gdrive input:focus, .form-gdrive input:hover {

    background: #fff;

    border: 1px solid #ebeff3;

}  

.form-gdrive:after {

    position: absolute;

    content: "";

    left: 10px;

    bottom: 10px;

    background: #007bff;

    color: #fff;

    padding: 5px 15px 7px 15px;

    border-radius: 5px 0 0 5px;

    font-size: 12px;

    line-height: 2;

    z-index: 2;

}

.form-gdrive.input input {

    width: calc(100% - 80px);

    padding: 10px 15px 10px 65px;

}

.form-gdrive.output input{

    width: calc(100% - 90px);

    padding: 10px 15px 10px 75px;

}  

.form-gdrive.input:after {

    content: "Link :";

}

.form-gdrive.output:after {

    content: "Result :";

} 

button#get-button {

    color: #fff;

    background-color: #007bff;

    display: inline-block;

    text-align: center;

    cursor: pointer;

    outline: none;

    border: none;

    border-radius: 6px;

    font-size: 14px;

    font-weight: bold;

    padding: 7px 15px;

    margin: 0 auto;

}  

button#copy,button#download,button#reset {

    color: #fff;

    background-color: #007bff;

    display: inline-block;

    text-align: center;

    cursor: pointer;

    outline: none;

    border: none;

    border-radius: 6px;

    font-size: 14px;

    font-weight: bold;

    padding: 7px 15px;

    margin: 0 auto;

}

</style>

<script>

//<![CDATA[

function getButton(){

    var input = document.getElementById("driveID").value,

        drive = input.indexOf("github.com");

    if (-1 != drive) {

        var textd = input.indexOf("ajax-jquery/sophiainstitute/blob/master/"),

            textEdit = input.indexOf("/edit"),

            driveID = input.slice(textd + 2, textEdit),

            output = "https://docs.google.com/$type/d/" + driveID + "/export?format=pdf";

        -1 !== input.indexOf("document")

            ? (output = output.replace("$type", "document").split("pdf").join("docx"))

            : -1 !== input.indexOf("spreadsheet")

            ? (output = output.replace("$type", "spreadsheets").split("pdf").join("xlsx"))

            : -1 !== input.indexOf(".css")

            ? (output = "https://cdn.sophiainstitute.id/" + (driveID = input.slice(textd + 40, textEdit)) + "s")

            : ((textEdit == input.indexOf("/")), (output = "https://cdn.sophiainstitute.id/" + (driveID = input.slice(textd + 40, textEdit)) + "s"));

      document.getElementById("output").value = output;

      document.querySelector(".input").style.display = "none";

      document.querySelector(".output").style.display = "block";

      document.querySelector(".tombol-copy-reset").style.display = "block";

      document.getElementById("get-button").style.display = "none";

    } else {

      document.getElementById("driveID").value = "Url tidak sesuai format";

    }

  }

  function copy(){

    document.getElementById("output").select();

    document.execCommand('copy');

    document.getElementById("text-keterangan").innerHTML = "Link berhasil disalin";

    document.getElementById("text-keterangan").style.margin = "10px 0";

  }

  function download(){

    var linkUnduh = document.getElementById("output").value;

    window.open(linkUnduh,'_blank');

  }

  function reset(){

    window.location.href = window.location.href;

  }

  window.onload = function() {

    document.getElementById("driveID").focus(), document.getElementById("get-button").onclick = getButton, document.getElementById("copy").onclick = copy, document.getElementById("download").onclick = download, document.getElementById("reset").onclick = reset;

  };

//]]>

</script>

<div class='generator-gdrive'>

  <div class='form-gdrive input'>

    <label for='gdrive'>Tools CDN JAVASCRIPT/CSS Github individu</label>

    <span>*Contoh: gak usah pakai contoh</span>

    <input name='gdrive' id='driveID' placeholder='Input Link Disini' type='text'/>

  </div>

  <div class='tombol-get'>

    <button id='get-button'>Ubah Link</button>

  </div>

  <div class='form-gdrive output'>

    <label for='gdrive'>Result</label>

    <input name='gdrive' id='output' placeholder='Input Link Disini' type='text' readonly='readonly'/>

  </div>

  <div class='tombol-copy-reset'>

    <div id='text-keterangan'></div>

    <button id='copy'>Copy Link</button>

    <button id='download'>Download</button>

    <button id='reset'>Reset</button>

  </div>

</div>
