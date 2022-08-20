<script type="text/javascript">
    function signup(){
      Firstname = document.sign.fname.value;
      Lastname = document.sign.lname.value;
      Email=document.sign.email.value;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      Contact = document.sign.contact.value;
      Password= document.sign.password.value;
    
      if(Firstname == ""){
        alert("Please enter firstname");
        return false;
      }
      if(!isNaN(Firstname)){
        alert("Firstname cannot be numeric");
        return false;
      }
      if(Lastname == ""){
        alert("Please enter lastname");
        return false;
      }
      if(!isNaN(Lastname)){
        alert("Lastname cannot be numeric");
        return false;
      }

      var call = /^\d{10}$/;
      if(Contact == ""){
        alert("Please enter number");
        return false;
      }
      if(isNaN(Contact)){
        alert("contact pattern must be numeric");
        return false;
      }
      if(!Contact.match(call)){
        alert("contact must be of 10 digits");
        return false;
      }
     
      if(Email == ""){
        alert("Please enter email");
        return false;
      }
      if(!Email.match(mailformat)) {
        alert("Please Enter valid email");
        return false;
      }

      if(Password == ""){
        alert("Please enter password");
        return false;
      }
      if(Password.length<5){
        alert("password must be greater than 5");
        return false;
      }
      return true;
    }

    function logs(){
      Email = document.fill.email.value;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      Pass = document.fill.password.value;

      if(Email == ""){
        alert("Please enter email");
        return false;
      }
      if(!Email.match(mailformat)) {
        alert("Please Enter valid email");
        return false;
      }

      if(Pass == ""){
        alert("Please enter password");
        return false;
      }
      if(Password.length<5){
        alert("password must be greater than 5");
        return false;
      }
      return true;
    }

    function add()
    {
      Name = document.sign.name.value;
      Image = document.sign.image.value;
      if(Name == "")
      {
        alert("Category name cannot be empty");
        return false;
      }
      if(!isNaN(Name))
      {
        alert("Category name cannot be numeric");
        return false;
      }
      if(Image=="")
      {
        alert("Image is not uploaded");
        return false;
      }
      return true
    }

    function logins(){
      Username = document.fill.username.value;
      Pass = document.fill.password.value;
      
      if(Username == ""){
        alert("Please enter username");
        return false;
      }

      if(Pass == ""){
        alert("Please enter password");
        return false;
      }
      if(Password.length<5){
        alert("password must be greater than 5");
        return false;
      }
      return true;
    }

    function product()
    {
      Name = document.sign.name.value;
      Price = document.sign.price.value;
      Image = document.sign.image.value;
      Category = document.sign.category.value;
      if(Name == "")
      {
        alert("Category name cannot be empty");
        return false;
      }
      if(!isNaN(Name))
      {
        alert("Category name cannot be numeric");
        return false;
      }
      if(Image=="")
      {
        alert("Image is not uploaded");
        return false;
      }
      if(Price == "")
      {
        alert("Price cannot be empty");
        return false;
      }
      if(!isNaN(Price))
      {
        alert("Price must be numeric");
        return false;
      }
      if(Price< 150)
      {
        alert("Price must be greater than 150");
        return false;
      }

      if(Category == "")
      {
        alert("Please select category");
        return false;
      }
      return true
    }
  </script>