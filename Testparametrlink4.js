function get(property){
var url=window.location.search;
  url=url.substring(1).split('&');
  for(var i=0;i < url.length;i++){
    var data=url[i].split('=');
    if(data[0] == property){
      return data[1];
    }
  }
}
var nama=get('filename');
document.writeln("nama "+nama);
