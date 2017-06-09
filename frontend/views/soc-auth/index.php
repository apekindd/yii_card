<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<div class="g-signin2" data-onsuccess="onSignIn"></div>
<script>
    var isAuth=false;
    function onSignIn(googleUser) {
        var profile = googleUser.getBasicProfile();
        if(!isAuth) {
            $.ajax({
                url: "/auth/check",
                type: "post",
                dataType: "json",
                data: {
                    id: profile.getId(),
                    name: profile.getName(),
                    type: 'google',
                    image: profile.getImageUrl()
                },
                beforeSend: function(){
                    isAuth=true;
                },
                success: function(data){
                    var json = JSON.parse(data);
                    console.log(json);
                    if(json.status == "success"){
                        var date = new Date(new Date().getTime() + 86400 * 1000 * 600);
                        document.cookie = "hgauth="+json.auth_string+"; path=/; expires=" + date.toUTCString();
                    }
                },
                complete: function(){
                    isAuth=false;
                }
            });
        }
    }
</script>