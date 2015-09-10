console.log("hello");
PATH = "http://localhost:8000/api/v1/posts";

$ResulOut          = $("#ResulOut");
$InputSearchInput  = $("#InputSearch-input");
$InputSearchButton = $("#InputSearch-button");

$InputSearchInput.on("input", onSubmit);
$InputSearchButton.on("click", onSubmit);

// EVENTS
function onSubmit (evt) {
    evt.preventDefault();

    query = "title="+$InputSearchInput.val();
    getResources(query, fillPosts);
    $ResulOut.html("buscando...");
}

// AJAX
function getResources (query, cbSuccess) {
    $.ajax({
        url: PATH+"?"+query,
        type: 'GET',
        success: cbSuccess
    });
};

// FILL
function fillPosts (data) {
    console.log(data);
    posts = data.data;

    $(posts).each(function (i) {
        var html = postTemplate(posts[i]);
        $ResulOut.prepend(html);
    });
}

// TEMPLATES
function postTemplate (post) {
    var html = "";

    html += "<article class='feature left'>";
    html += "<span class='image'><img src="+ post.image_url +" alt="+ post.title +" /></span>";
    html += "<div class='content'>";
    html += "<h2>"+ post.title +"</h2>";
    html += "<p>"+ post.body +"</p>";
    html += "<ul class='actions'>";
    html += "<li><a href='#' class='button alt'>More</a></li>";
    html += "</ul></div></article>";

    return html;
}
