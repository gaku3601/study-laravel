window.Method = {
    POST: "post",
    GET: "get",
    DELETE: "delete",
    PATCH: "patch"
}
var ajax = new XMLHttpRequest();
ajax.responseType = 'json';
window.http = function (method, uri, json, success, error){
    ajax.open(method, uri);
    ajax.setRequestHeader("Content-Type", "application/json");
    ajax.setRequestHeader("X-CSRF-TOKEN", document.getElementsByName('csrf-token')[0].content);
    ajax.send(JSON.stringify(json));
    ajax.onload = () => {
        success(ajax);
    };
    ajax.onerror = () => {
        error(ajax)
    };
}
