//JS 
function like(publicationId,userId){
    console.log(publicationId);
    console.log(userId);
    fetch(`http://localhost/medHachami_avito_V2/publications/likePublication/${publicationId}/${userId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', 
        },
       
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'liked') {
            // Update the DOM element (heart image) based on success
            console.log(data.message);
            // return 1
            // You can replace the console.log with code to update the DOM element.
            location.reload();
        } else if (data.status === 'disliked') {
            // Handle the case where the user has already liked the publication
            location.reload();
            console.log(data.message);
        } else {
            // Handle errors
            console.error(data.message);
        }
    })
    .finally(() => {
        location.reload();
    });
   
    
}

function displayOption(clickedElement) {
    var listOptions = clickedElement.closest('.pub-header').querySelector(".editList");
    
    if (listOptions.style.display === "none") {
        listOptions.style.display = "block";
    } else {
        listOptions.style.display = "none";
    }
}


// Alert

class CustomAlert{

    // constructor(id, title){
    //     this.id = id;
    //     this.title = title;
    //     console.log('hello from custom alert');
    // }
    constructor(){
        console.log('hello from custom alert');
    }
    alerts(id,title){
        
    //     // console.log(title);
      document.body.innerHTML = document.body.innerHTML + '<div id="dialogoverlay"></div><div id="dialogbox" class="slit-in-vertical"><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div>';
  
      let dialogoverlay = document.getElementById('dialogoverlay');
      let dialogbox = document.getElementById('dialogbox');
      
      let winH = window.innerHeight;
      dialogoverlay.style.height = winH+"px";
      
      dialogbox.style.top = "100px";
  
      dialogoverlay.style.display = "block";
      dialogbox.style.display = "block";
      
      document.getElementById('dialogboxhead').style.display = 'block';
  
      if(typeof title === 'undefined') {
        document.getElementById('dialogboxhead').style.display = 'none';
      } else {
        document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+ title;
      }
      document.getElementById('dialogboxbody').innerHTML = `Are you sure you want to delete :  `;
      document.getElementById('dialogboxfoot').innerHTML = '<button class="pure-material-button-contained active" onclick="ok(' + id + ')">OK</button>' +
                                                               '<button class="pure-material-button-contained" onclick="cancel()">Cancel</button>';
      
    }
    
    
  }

  function ok(publicationId) {
    fetch(`http://localhost/medHachami_avito_V2/publications/delete/${publicationId}`, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
        },
      
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'deleted') {
            console.log(data.message);
           
        } else if(data.status === 'failed') {
            console.log(data.message);
         
        }else {
            // Handle errors
            console.error(data.message);
        }
    })
    .finally(() => {
        location.reload();
    });
   
}
function cancel(){
    document.getElementById('dialogbox').style.display = "none";
    document.getElementById('dialogoverlay').style.display = "none";
    console.log('OKK');
}

class CustomAlertAdmin{

    
    constructor(){
        console.log('hello from custom alert');
    }
    alerts(id,title){
        
    //     // console.log(title);
      document.body.innerHTML = document.body.innerHTML + '<div id="dialogoverlay"></div><div id="dialogbox" class="slit-in-vertical"><div><div id="dialogboxhead"></div><div id="dialogboxbody"></div><div id="dialogboxfoot"></div></div></div>';
  
      let dialogoverlay = document.getElementById('dialogoverlay');
      let dialogbox = document.getElementById('dialogbox');
      
      let winH = window.innerHeight;
      dialogoverlay.style.height = winH+"px";
      
      dialogbox.style.top = "100px";
  
      dialogoverlay.style.display = "block";
      dialogbox.style.display = "block";
      
      document.getElementById('dialogboxhead').style.display = 'block';
  
      if(typeof title === 'undefined') {
        document.getElementById('dialogboxhead').style.display = 'none';
      } else {
        document.getElementById('dialogboxhead').innerHTML = '<i class="fa fa-exclamation-circle" aria-hidden="true"></i> '+ title;
      }
      document.getElementById('dialogboxbody').innerHTML = `Are you sure you want to delete :  `;
      document.getElementById('dialogboxfoot').innerHTML = '<button class="pure-material-button-contained active" onclick="ok1(' + id + ')">OK</button>' +
                                                               '<button class="pure-material-button-contained" onclick="cancel()">Cancel</button>';
      
    }
    
    
  }


  function ok1(id){
    fetch(`http://localhost/medHachami_avito_V2/admin/delete/${id}`, {
        method: 'POST', 
        headers: {
            'Content-Type': 'application/json',
        },
      
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'deleted') {
            console.log(data.message);
           
        } else if(data.status === 'failed') {
            console.log(data.message);
         
        }else {
            // Handle errors
            console.error(data.message);
        }
    })
    .finally(() => {
        location.reload();
    });
  }
  var page1 = document.getElementById("page1");
  var page2 = document.getElementById("page2");
  function pagination(i){
   if(i===1){
    page2.style.display = 'none';
    page1.style.display = 'block';
   }else{
    page2.style.display = 'block';
    page1.style.display = 'none';
   }
  }