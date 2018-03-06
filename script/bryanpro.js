var loginwindow = new Vue({
  el: '.login',
  data:{
    titel: 'login window'
  }
})
var users = new Vue({
  el: '.logindata',
  data: {
    users:[/*starting array with user data*/
      {
        username: 'vendetta'
        password: 'welkom'
      },
      {
        username: 'janjansen'
        password: 'welkom'
      },
      {
        username: 'gebruiker01'
        password: 'Welkom123'
      }
    ]
  }
})
