---

layout: post 
title: CDN Githack

---

<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,700|Source+Code+Pro:400,700">
<link rel="stylesheet" href="//rawcdn.githack.com/neoascetic/rawgithack/9e126bd/rawgithack.css">
<script src="/safelink/css/clipboard.min.js"></script>
<p>
<input id="url" class="url" type="url" placeholder="Paste an URL here" autofocus="" tabindex="1" />
</p>
<p class="url-container">
<input id="url-prod" class="url" placeholder="hasil" readonly="" tabindex="2" />
<button id="url-prod-copy" class="url-copy-button" data-clipboard-target="#url-prod" title="Copy URL" disabled="" style="display:inline-block">
C
</button>
</p>
<p class="hidden">
<input id="url-dev" class="url" placeholder="https://raw.githack.com/user/repo/branch/file" readonly tabindex="3">
<button id="url-dev-copy" class="url-copy-button" data-clipboard-target="#url-dev" title="Copy URL" disabled>
<img src="//rawcdn.githack.com/neoascetic/rawgithack/4558441/clippy.svg" alt="">
</button>
</p>
<script>
(function(doc){"use strict";const GITHUB_API_URL='https://api.github.com';const TEMPLATES=[[/^(https?):\/\/gitlab\.com\/([^\/]+.*\/[^\/]+)\/(?:raw|blob)\/(.+?)(?:\?.*)?$/i,'$1://gl.githack.com/$2/raw/$3'],[/^(https?):\/\/bitbucket\.org\/([^\/]+\/[^\/]+)\/(?:raw|src)\/(.+?)(?:\?.*)?$/i,'$1://bb.githack.com/$2/raw/$3'],[/^(https?):\/\/bitbucket\.org\/snippets\/([^\/]+\/[^\/]+)\/revisions\/([^\/\#\?]+)(?:\?[^#]*)?(?:\#file-(.+?))$/i,'$1://bb.githack.com/!api/2.0/snippets/$2/$3/files/$4'],[/^(https?):\/\/bitbucket\.org\/snippets\/([^\/]+\/[^\/\#\?]+)(?:\?[^#]*)?(?:\#file-(.+?))$/i,'$1://bb.githack.com/!api/2.0/snippets/$2/HEAD/files/$3'],[/^(https?):\/\/bitbucket\.org\/\!api\/2.0\/snippets\/([^\/]+\/[^\/]+\/[^\/]+)\/files\/(.+?)(?:\?.*)?$/i,'$1://bb.githack.com/!api/2.0/snippets/$2/files/$3'],[/^(https?):\/\/api\.bitbucket\.org\/2.0\/snippets\/([^\/]+\/[^\/]+\/[^\/]+)\/files\/(.+?)(?:\?.*)?$/i,'$1://bb.githack.com/!api/2.0/snippets/$2/files/$3'],[/^(https?):\/\/(?:cdn\.)?rawgit\.com\/(.+?\/[0-9a-f]+\/raw\/(?:[0-9a-f]+\/)?.+)$/i,'$1://gist.githack.com/$2'],[/^(https?):\/\/(?:cdn\.)?rawgit\.com\/([^\/]+\/[^\/]+\/[^\/]+|[0-9A-Za-z-]+\/[0-9a-f]+\/raw)\/(.+)/i,'$1://raw.githack.com/$2/$3'],[/^(https?):\/\/raw\.github(?:usercontent)?\.com\/([^\/]+\/[^\/]+\/[^\/]+|[0-9A-Za-z-]+\/[0-9a-f]+\/raw)\/(.+)/i,'$1://raw.githack.com/$2/$3'],[/^(https?):\/\/github\.com\/(.[^\/]+?)\/(.[^\/]+?)\/(?!releases\/)(?:(?:blob|raw)\/)?(.+?\/.+)/i,'$1://raw.githack.com/$2/$3/$4'],[/^(https?):\/\/gist\.github(?:usercontent)?\.com\/(.+?\/[0-9a-f]+\/raw\/(?:[0-9a-f]+\/)?.+)$/i,'$1://gist.githack.com/$2'],[/^(https?):\/\/git\.sr\.ht\/(~[^\/]+\/[^\/]+\/blob\/.+\/.+)/i,'$1://srht.githack.com/$2'],[/^(https?):\/\/hg\.sr\.ht\/(~[^\/]+\/[^\/]+\/raw\/.+)/i,'$1://srhgt.githack.com/$2']];var prodEl=doc.getElementById('url-prod');var devEl=doc.getElementById('url-dev');var urlEl=doc.getElementById('url');new Clipboard('.url-copy-button');var devCopyButton=doc.getElementById('url-dev-copy');var prodCopyButton=doc.getElementById('url-prod-copy');if(doc.queryCommandSupported&&doc.queryCommandSupported('copy')){devCopyButton.style.display='inline-block';prodCopyButton.style.display='inline-block'}
urlEl.addEventListener('input',formatURL,!1);if(/(iPhone|iPad|iPod)/i.test(navigator.userAgent)){inputDev.removeAttribute('readonly')
inputProd.removeAttribute('readonly')
inputDev.addEventListener('keydown',function(e){e.preventDefault()});inputProd.addEventListener('keydown',function(e){e.preventDefault()})}
formatURL();function formatURL(){var url=urlEl.value=mergeSlashes(decodeURIComponent(urlEl.value.trim()));urlEl.classList.remove('valid');urlEl.classList.toggle('invalid',url.length);devEl.value='';prodEl.value='';devEl.classList.remove('valid');prodEl.classList.remove('valid');devCopyButton.disabled=!0;prodCopyButton.disabled=!0;var ghUrl=maybeConvertUrl(url);if(ghUrl){var matches=ghUrl.match(/^(\w+:\/\/(raw).githack.com\/([^\/]+)\/([^\/]+))\/([^\/]+)\/(.*)/i);if(!matches){devEl.value=ghUrl;prodEl.value=cdnize(ghUrl);setValid()}else if(matches[2]==='raw'){devEl.value=ghUrl;let apiUrl=`${GITHUB_API_URL}/repos/${matches[3]}/${matches[4]}/git/refs/heads/${matches[5]}`;fetch(apiUrl).then(res=>{if(res.ok)return res.json()}).then(data=>{let ref=data&&data.object&&data.object.sha?data.object.sha:matches[5];prodEl.value=cdnize(`${matches[1]}/${ref}/${matches[6]}`);setValid()})}}}
function mergeSlashes(url){try{var url=new URL(url)}catch(e){return url}
url.pathname=url.pathname.replace(/\/\/+/ig,'/');return url.toString()}
function maybeConvertUrl(url){for(var i in TEMPLATES){var[pattern,template]=TEMPLATES[i];if(pattern.test(url)){return url.replace(pattern,template)}}}
function cdnize(url){return url.replace(/^(\w+):\/\/(\w+)/,"$1://$2cdn")}
function setValid(){urlEl.classList.remove('invalid');urlEl.classList.add('valid');prodEl.classList.add('valid');devEl.classList.add('valid');devCopyButton.disabled=!1;prodCopyButton.disabled=!1}
prodEl.addEventListener('focus',onFocus);devEl.addEventListener('focus',onFocus);urlEl.addEventListener('focus',onFocus);function onFocus(e){setTimeout(function(){e.target.select()},1)}
function hide(element){element.classList.add('hidden')}
function show(element){element.classList.remove('hidden')}
var filesTextarea=doc.querySelector('.purge textarea');var filesSubmit=doc.querySelector('.purge input[type=submit]');var filesWait=doc.querySelector('.purge .wait');var filesSuccess=doc.querySelector('.purge .success');var filesError=doc.querySelector('.purge .error');autosize(filesTextarea);filesTextarea.oninput=function(){var result=[];for(var url of this.value.split('\n')){var url=decodeURIComponent(url.trim());var converted=maybeConvertUrl(url);result.push(converted?cdnize(converted):url)}
this.value=result.join('\n');return!1}
document.getElementById('purge-form').onsubmit=function(){filesTextarea.disabled=!0;filesSubmit.disabled=!0;hide(filesSuccess);hide(filesError);show(filesWait);var body='files='+encodeURIComponent(filesTextarea.value);fetch('/purge',{method:'POST',body:body}).then(res=>{if(res.status==429){return{success:!1,response:'too many requests'}}
return res.json()}).then(res=>{hide(filesWait);filesSubmit.disabled=!1;filesTextarea.disabled=!1;var operand=res.success?filesSuccess:filesError;operand.textContent=res.response;show(operand)});return!1}}(document));
</script>

<style>
/* CSS Safelink ubah warna cari kode #f89000 */
.wcSafeShow{position:relative;width:35px;height:35px;display:flex;margin:auto} /* atur margin untuk mengubah posisi icon */.safeWrap{position:fixed;top:0;left:0;bottom:0;right:0;background:rgba(0,0,0,.5);z-index:999999;-webkit-backdrop-filter:blur(6px);backdrop-filter:blur(6px)}.panel-primary{background:#fff;text-align:center;display:block;overflow:hidden;width:100%;max-width:100%;padding:0 0 25px 0;border-radius:5px;box-shadow:0 1px 3px rgba(0,0,0,0.12),0 1px 2px rgba(0,0,0,0.24)}.panel-body{position:relative;margin:0 25px}.panel-heading h2, .JudulLink h2{background:#f89000;color:#fff;margin:0 auto 25px auto;font-weight:400;padding:15px;font-size:20px}.JudulLink h2{font-size:13px;border-radius: 7px}.panel-body input{height:56px;background:rgba(0,0,0,0.04);width:100%;padding:15px;border-radius:5px;border:1px solid transparent;font-size:16px;color:#000;outline:none;text-indent:60px;transition:all .3s}.panel-body input:focus{background:#fff;color:#000;border-color:#f89000;outline:none;box-shadow:0 0 5px rgba(0,0,0,0.1)}.panel-body .input-group-btn{position:absolute;top:0;right:0}.panel-body button{border-radius:0 5px 5px 0;background:#f89000;color:#fff;border:0;padding:17px 52px;font-weight:500;outline:none;transition:all .3s}.panel-body button:hover,.panel-body button:focus{background:#f89000;outline:none}#generatelink{margin:20px auto 0 auto}#generatelink button{background:#f89000;border-radius:5px;font-size:14px;padding:14px 32px}#generatelink button:hover,#generatelink button:focus{background:#f89000;border-radius:5px;font-size:14px}#generatelink input{background:rgba(0,0,0,0.05);text-indent:0}#generatelink input:hover,#generatelink input:focus{background:#f89000;border-color:transparent;box-shadow:none}#generateloading{margin:20px auto 0 auto;font-size:20px;color:#f89000;font-weight:normal}.panel-body:before{content:'\279C';background:rgba(0,0,0,0.05);position:absolute;left:0;top:0;color:#888;padding:17px 20px;border-radius:5px 0 0 5px;border-right:1px solid transparent;transition:all .6s}.panel-body:focus-within:before{content:'\279C';background:#f89000;color:#fff}.bt-success{display:inline-flex;align-items:center;margin:15px 15px;padding:10px 20px;outline:0;border:0;border-radius:2px;color:#fefefe;background-color:#f89000;font-size:14px;white-space:nowrap;overflow:hidden;max-width:100%;line-height:2em}.bt-success:hover{color:#f89000;background-color:transparent;border:1px solid #f89000}.hidden,.bt-success.hidden{display:none}.wcSafeClose{display:inline-flex;align-items:center;margin:15px auto -15px;padding:5px 15px;outline:0;border:0;border-radius:2px;color:#fefefe;background-color:#f89000;font-size:14px;white-space:nowrap;overflow:hidden;max-width:100%;line-height:2em}.copytoclipboard{margin:10px auto 5px}#timer{margin:0 auto 20px auto;width:80px;text-align:center}.pietimer{position:relative;font-size:200px;width:1em;height:1em}.pietimer > .percent{position:absolute;top:25px;left:12px;width:3.33em;font-size:18px;text-align:center;display:none}.pietimer > .slice{position:absolute;width:1em;height:1em;clip:rect(0px,1em,1em,0.5em)}.pietimer >.slice.gt50{clip:rect(auto,auto,auto,auto)}.pietimer > .slice > .pie{border:0.06em solid #c0c0c0;position:absolute;width:1em;height:1em;clip:rect(0em,0.5em,1em,0em);border-radius:0.5em}.pietimer > .slice > .pie.fill{-moz-transform:rotate(180deg)!important;-webkit-transform:rotate(180deg)!important;-o-transform:rotate(180deg)!important;transform:rotate(180deg)!important}.pietimer.fill > .percent{display:none}.pietimer.fill > .slice > .pie{border:transparent;background-color:#c0c0c0;width:1em;height:1em}.wcSafeShow svg{fill:none!important;stroke:#48525c;stroke-linecap:round;stroke-linejoin:round;stroke-width:1;width:22px;height:22px}#generateloading svg{width:22px;height:22px;fill:#f89000}.btn-primary svg,.darkMode .btn-primary svg{fill:none;stroke:#fff;stroke-width:1.5;width:22px;height:22px;vertical-align:-5px;margin-right:10px}@media screen and (max-width:768px){.panel-body .input-group-btn{display:block;position:relative;overflow:hidden;margin:20px auto 0 auto}.panel-body button{border-radius:5px;width:100%}}@media screen and (max-width:480px){.panel-primary{margin-top:30%}}
  .invalid {
  background: #FFF7F7;
  border-color: #FFCCCC;
}

.valid {
  background: #F2FFEB;
  border-color: #98f9a0;
}
</style>
<div style="display:none" class="generator-gdrive">
<div class="form-gdrive input">
</div>
<div class="form-gdrive output">
<label for="gdrive">Result</label>
<input name="gdrive" id="output" placeholder="Input Link Disini" type="text" readonly="readonly" />
</div>
</div>
<div class="panel-primary">
<div class="panel-heading">
<h2>Github to Githack</h2>
</div>
<span style="font-size:12px">*Contoh: https://drive.google.com/file/d/xxxxxxxxxxxxxxxxxxxxxxxxxxxx/view?usp=sharing</span>
<div class="panel-body">
<input name="gdrive" id="driveID" placeholder="https://github.com/ajax-jquery/buku.github.io/blob/main/Buku-kiri/Penerjemahan%20dan%20Penerimaan%20Kapital%20di%20Indonesia.pdf" type="url" value="" />
<div class="hidden" id="generateloading">
<svg viewBox="0 0 50 50" x="0px" y="0px"><path d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z"><animateTransform attributeName="transform" attributeType="xml" dur="0.6s" from="0 25 25" repeatCount="indefinite" to="360 25 25" type="rotate" /></path></svg></div>
<div class="hidden" id="generatelink">
<h2>Hasil</h2>
<input autocomplete="off" id="generateurl" oninvalid="this.setCustomValidity(&apos;Please Enter valid link&apos;)" placeholder="Hanya Menerima URL Github" required="required" type="url" readonly="readonly" value="" />
<button class="copytoclipboard" data-clipboard-action="copy" data-clipboard-target="#generateurl" id="copytoclipboardA">Copy URL Download</button>
<input id="resulturl" onclick="this.focus();this.select()" readonly="readonly" type="text" placeholder="Hanya Menerima URL Github" />
<button class="copytoclipboard" data-clipboard-action="copy" data-clipboard-target="#resulturl" id="copytoclipboardB">Copy URL Safelink</button>
</div>
</div>
<a class="hidden" id="reset" href="javascript:void">RESET</a>
</div>
<script>
$(".wcSafeShow").click(function(){$(".safeWrap").fadeIn()}),
$("#reset").click(function(){$(".safeWrap").fadeOut(),$("#generatelink").addClass("hidden"),$("#generateurl").val(""),$("#driveID").val(""),$("#driveID").attr("style",""),$("#reset").attr("class","hidden"),$("#copytoclipboardA").html(setCopyUrlA),$("#copytoclipboardB").html(setCopyUrlB)});
$(document).ready(function(){$('#driveID').keyup(function(){


    var dataID = $("#driveID").val();
     drive = dataID.indexOf("github.com");
    if (-1 != drive){
      var input = dataID.split("https://github.com/").join("https://rawcdn.githack.com/").replace("/blob", "");
     
      var output=input;
           
document.getElementById("output").value = output;$("#generateurl").val(output);
$('#output').val(output);document.getElementById("driveID").style="background:#F2FFEB;border-color: #98f9a0;"; var xx =$("#generatelink input")
xx.attr("style","background:#F2FFEB;border-color: #98f9a0;");

    } else {
      var x = document.querySelector("#driveID")
x.placeholder ="Hanya Menerima URL Github";x.style="background:#FFF7F7;border-color: #FF0000;";var xx =$("#generatelink input")
xx.attr("style","background:#FFF7F7;border-color: #FF0000;");xx.val("")
    }
  ;
var e=$("#generateurl").val(),r=$("#generatelink"),a=$("#generateloading"),n=$("#resulturl");
if(""==e)return $("#generateurl").focus(),!1;$("#copytoclipboardA").html(setCopyUrlA),$("#copytoclipboardB").html(setCopyUrlB),a.removeClass("hidden"),r.addClass("hidden"),$.ajax({url:"https://link.sophiainstitute.id/feeds/posts/summary/-/Pendidikan?alt=json-in-script",type:"get",dataType:"jsonp",success:function(t){var o="",l=t.feed.entry,s=new Array;if(void 0!==l){for(var i=0;i<l.length;i++){for(var d=0;d<l[i].link.length;d++)if("alternate"==l[i].link[d].rel){o=l[i].link[d].href;break}s[i]=o;var c=Math.random()*s.length;c=parseInt(c)}resultgenerate=s[c]+"#?o="+aesCrypto.encrypt(convertstr(e),convertstr("root")),a.addClass("hidden"),r.removeClass("hidden"),
$("#reset").attr("class","wcSafeClose"),
n.val(resultgenerate)}else n.val("No result!")},error:function(){n.val("Error loading feed!")}})}),
new ClipboardJS("#copytoclipboardA").on("success",function(e){$("#copytoclipboardA").html(setCopiedA)});
new ClipboardJS("#copytoclipboardB").on("success",function(e){$("#copytoclipboardB").html(setCopiedB)});
});
</script>
<script>
//<![CDATA[
/* Pengaturan safeLink */
var setTimer = 1; //waktu detik
var setColor = '#f89000'; //warna loading timer
var setCopyUrl = 'Copy URL Download'; // generator salin
var setText = 'Harap Tunggu...'; //pesan pada tombol
var setCopyUrlA = 'Salin URL Download'; //generator Salin
var setCopyUrlB = 'Salin URL Safelink'; //generator Salin
var setCopiedA = 'URL Download Tersalin'; //generator tersalin
var setCopiedB = 'URL Safelink Tersalin'; //generator tersalin
//]]> 
</script>
<script>
//<![CDATA[
/* Pengaturan safeLink */
var setTimer = 1; //waktu detik
var setColor = '#f89000'; //warna loading timer
var setCopyUrl = 'Copy URL Download'; // generator salin
var setText = 'Harap Tunggu...'; //pesan pada tombol
var setCopyUrlA = 'Salin URL Download'; //generator Salin
var setCopyUrlB = 'Salin URL Safelink'; //generator Salin
var setCopiedA = 'URL Download Tersalin'; //generator tersalin
var setCopiedB = 'URL Safelink Tersalin'; //generator tersalin
//]]> 
</script>
<script src="/safelink/css/wcsafelink.js"></script>
