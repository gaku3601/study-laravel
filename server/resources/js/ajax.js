window.METHOD = {
    POST: "post",
    GET: "get",
    DELETE: "delete",
    PATCH: "patch"
};

window.http = function(method, uri, json, success, error){
    const ajax = new XMLHttpRequest();
    ajax.responseType = 'json';
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
