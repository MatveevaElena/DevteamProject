$(".view_project").click(function(){
    console.log('adfsd');
    location.href = '/projectexchange/project/view?id='+this.getAttribute("data-id");
})

$(".project_signup-button").click(function(){
    location.href = '/projectexchange/requestentry/create?id='+this.getAttribute('data-id');
})
$(".team_personlink_update-button").click(function(){
    location.href = '/projectexchange/teampersonlink/update?id='+this.getAttribute('data-id');
})
$(".requestentry_update-button").click(function(){
    location.href = '/projectexchange/requestentry/update?id='+this.getAttribute('data-id');
})
$(".requestentry_delete-button").click(function(){
    location.href = '/projectexchange/requestentry/delete?id='+this.getAttribute('data-id');
})
$(".requestentry_approve-button").click(function(){
    location.href = '/projectexchange/requestentry/approve?id='+this.getAttribute('data-id');
})
