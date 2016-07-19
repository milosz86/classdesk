// Przechowuje adres
var serverAddress = "/php/handle.php";


// Funkcja obs³uguj¹ca ¿¹danie
function wstaw()

{

$.ajax({
  url: '/php/handle.php',
  dataType: 'json',
  success: function(response) {

    Okno = document.getElementById("wpis");
    Okno.style.backgroundColor="green";

   //Tworzymy strukturê DIV
   for (var i = 0; i < response.length;  i++) {

     var mainDiv = document.createElement("div");
         mainDiv.setAttribute("class", "pstMainDiv");
     var headerDiv = document.createElement("div");
         headerDiv.setAttribute("class", "pstHeaderDiv");
         headerDiv.setAttribute("id", "pst"+i);

     var subsDiv = document.createElement("div");
         subsDiv.setAttribute("class", "pstSubsDiv");
     var leftSubDiv = document.createElement("div");
         leftSubDiv.setAttribute("class", "pstLeftSubDiv");
     var rightSubDiv = document.createElement("div");
         rightSubDiv.setAttribute("class", "pstRightSubDiv");
     var headerNode = document.createTextNode("naglowek"+i);


     var rightNode = document.createTextNode(response[i].nazwa);
     headerDiv.appendChild(headerNode);
     rightSubDiv.appendChild(rightNode);

     subsDiv.appendChild(leftSubDiv);
     subsDiv.appendChild(rightSubDiv);
     mainDiv.appendChild(headerDiv);
     mainDiv.appendChild(subsDiv);
     Okno.appendChild(mainDiv);
     subsDiv.style.display="none";

     headerDiv.onclick = toggleSection(this.id);

  }
    }

      });
    }
    function toggleSection(a) {

      b = a.slice(3);
      var url = decodeURIComponent(response[b].url);
      var aktHeader = document.getElementById("pst"+b);
      var aktLeftSub = aktHeader.nextSibling.firstChild;
      var aktSub = aktHeader.nextSibling;

      if(aktSub.style.display =="none"){
      if (!aktLeftSub.firstChild) {
        aktSub.style.display ="initial";
      var leftNode = document.createElement("iframe");
      leftNode.setAttribute("src", url);
      leftNode.setAttribute("width", "560");
      leftNode.setAttribute("height", "315");
      leftNode.setAttribute("frameborder", "0");
      leftNode.setAttribute("allowfullscreen", "true");
        aktLeftSub.appendChild(leftNode);
      }
      else {aktSub.style.display ="initial";}
    }
      else {aktSub.style.display ="none";}
    }
