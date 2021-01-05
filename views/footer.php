<footer class="footer">

  <div class="container">
    &copy;Tweet
  </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>    
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
     -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="loginAlert" class="alert alert-danger"></div>
            <form>
<!-- hidden loginActive               -->
              <input type="hidden" name="loginActive" id="loginActive" value="1">

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Email Address">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password">
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <a href="#" id="toggleLogin">Sign up</a>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="loginSignupButton">Login</button>
          </div>
        </div>
      </div>
    </div>

    <script type="text/javascript">
      
      $("#toggleLogin").click(function(){

        if($("#loginActive").val() == '1'){

          $("#loginActive").val("0");
          $("#loginModalTitle").html("Sign up");
          $("#loginSignupButton").html("Sign up");
          $("#toggleLogin").html("login");

        }else{

          $("#loginActive").val("1");
          $("#loginModalTitle").html("Login");
          $("#loginSignupButton").html("Login");
          $("#toggleLogin").html("Sign up");

        }
      });

      $("#loginSignupButton").click(function(){

        $.ajax({
          type: "POST",
          url: "actions.php?action=loginSignup",
          data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&loginActive=" + $("#loginActive").val(),
          success: function(result){
            
            if(result == "1"){
              window.location.assign("http://localhost/php/");
            }else{

              $("#loginAlert").html(result).show();
            }
            
          }
        });
      });

      $(".toggleFollow").click(function(){
        
        var id =$(this).attr("data-userId");
        
        $.ajax({
          type: "POST",
          url: "actions.php?action=toggleFollow",
          data: "userId=" + id,
          success: function(result){
            
            
            if(result == '1'){

              $("a[data-userId= '" + id + "']").html("Follow");
            }else if(result == '2'){

              $("a[data-userId= '" + id + "']").html("Unfollow");
            }

          }
        });
      });
      
      $("#postTweetButton").click(function(){

        $.ajax({
          type: "POST",
          url: "actions.php?action=postTweet",
          data: "tweetContent=" + $("#tweetContent").val(),
          success: function(result){
            
            if(result == '1'){

              $("#tweetSuccess").show();
              $("#tweetFail").hide();

            }else if(result != ""){

              $("#tweetFail").html(result).show();
              $("#tweetSuccess").hide();

            }

          }
        });
      });

    </script>
  </body>
</html>