/**
 * Created by xk on 2018/4/20.
 */
function $(id){
    return document.getElementById(id);
}

//封装的用于ajax请求，并处理服务端响应数据的函数
function get(url, fn){
    var xhr = window.XMLHttpRequest ? new window.XMLHttpRequest :
        new ActiveXObject('Microsoft.XMLHTTP');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var res = xhr.responseText;
            res = JSON.parse(res);
            fn(res);
        }
    };
    xhr.open("get", url, true);
    xhr.send();
}

// function post(url, fn , data){
//     var xhr = window.XMLHttpRequest ? new window.XMLHttpRequest :
//         new ActiveXObject('Microsoft.XMLHTTP');
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState == 4 && xhr.status == 200) {
//             var res = xhr.responseText;
//             //res = JSON.parse(res);
//             fn(res);
//         }
//     };
//     xhr.open("post", url, true);
//     xhr.send(data);
// }