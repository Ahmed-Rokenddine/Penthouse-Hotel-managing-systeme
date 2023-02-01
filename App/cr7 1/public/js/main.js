var input = document.querySelector('#datefield');
          input.addEventListener('input', updateValue);
         
    
          function updateValue(e) {
          arrival.setAttribute("min", e.target.value);
    }

      
      
      function look(){
        var elements = document.getElementsByClassName("roomies");
      var allHidden = true;
      
      for (var i = 0; i < elements.length; i++) {
        if (elements[i].style.display !== "none") {
          allHidden = false;
          break;
        }
      }
      if (allHidden ) {
        document.getElementById("e6").style.display = "block";
      }
      else{document.getElementById("e6").style.display = "none";}
      }
      
      
          
      
      function showFunction() {
          if ( document.documentElement.scrollTop > 10) {
              document.getElementById("Section1").style.display = "block";
          } else {
              document.getElementById("Section1").style.display = "none";
          }
      }
      function showFunction2() {
          if ( document.documentElement.scrollTop > 450) {
              document.getElementById("Section2").style.display = "block";
          } else {
              document.getElementById("Section2").style.display = "none";
          }
      }
      function showFunction3() {
          if ( document.documentElement.scrollTop > 750) {
              document.getElementById("Section3").style.display = "block";
          } else {
              document.getElementById("Section3").style.display = "none";
          }
      }
      function showFunction4() {
          if ( document.documentElement.scrollTop > 1000) {
              document.getElementById("Section4").style.display = "block";
          } else {
              document.getElementById("Section4").style.display = "none";
          }
      }
      function showFunction5() {
          if ( document.documentElement.scrollTop > 1500) {
              document.getElementById("Section5").style.display = "block";
          } else {
              document.getElementById("Section5").style.display = "none";
          }
      }
      function showFunction6() {
          if ( document.documentElement.scrollTop >  2000 ) {
              document.getElementById("Section6").style.display = "block";
          } else {
              document.getElementById("Section6").style.display = "none";
          }
      }
      function showFunction7() {
          if ( document.documentElement.scrollTop > 3300) {
              document.getElementById("Section7").style.display = "block";
          } else {
              document.getElementById("Section7").style.display = "none";
          }
      }
      function showFunction8() {
          if ( document.documentElement.scrollTop > 3900) {
              document.getElementById("Section8").style.display = "block";
          } else {
              document.getElementById("Section8").style.display = "none";
          }
      }
      function showFunction9() {
          if ( document.documentElement.scrollTop > 4600) {
              document.getElementById("Section9").style.display = "block";
          } else {
              document.getElementById("Section9").style.display = "none";
          }
      }
      
          //Variable to call the select ID
          
          function myFunction() {
            var x = document.getElementById("id1").value;
          if (x == "Suite") {document.getElementById("id2").style.display = "block";} 
          else document.getElementById("id2").style.display = "none";}
            
            var today = new Date();
            var dd = today.getDate()  ;
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();
      
               if (dd < 10) {
                             dd = '0' + dd;
                            }
      
              if (mm < 10) {
                           mm = '0' + mm;
                           } 
          
            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("datefield").setAttribute("min", today);
            
            var arrival = document.getElementById("datefield1");
            var departure = document.getElementById("datefield");
            var x = document.getElementById("id1").value;
      
            
      
      
            
      function valuecatcher(){
        var arr = arrival.value;
        var dep = departure.value;
      sessionStorage.setItem("arr", arr);
      sessionStorage.setItem("dep", dep);
      sessionStorage.setItem("type", x);
      }
      window.onload = valueloader();
      function valueloader(){
        var arr = sessionStorage.getItem("arr");
        var dep = sessionStorage.getItem("dep");  
        document.getElementById("datefield").value=dep;
        document.getElementById("datefield1").value=arr;
      }
      function catchvalue() {
        var arr = arrival.value;
        var dep = departure.value;
      sessionStorage.setItem("arr", arr);
      sessionStorage.setItem("dep", dep);
      }
      function putvalue(){
        var arr = sessionStorage.getItem("arr");
        var dep = sessionStorage.getItem("dep");
        document.getElementById("datefield2").value=dep;
        document.getElementById("datefield3").value=arr;
        var date1 = new Date(arr);  
        var date2 = new Date(dep);  
        var time_difference = date1.getTime() - date2.getTime();  
        var result = time_difference / (1000 * 60 * 60 * 24);  
        var box = document.getElementById('box').innerHTML;
        var discount = document.getElementById('discount').innerHTML;
        var totali = result * box ;
        var total = totali - (totali * (discount / 100));
        document.getElementById("data").innerHTML=total;
        document.getElementById("totalito").value=total;
      }
      function Suite() {
        var x = document.getElementById("id1").value;
        var elms = document.querySelectorAll("[id='Suite']");
          if (x == "Suite") {
               for(var i = 0; i < elms.length; i++) 
                 elms[i].style.display='Block'; 
                            } 
          else for(var i = 0; i < elms.length; i++) 
                 elms[i].style.display='None'; 
          
        }
        function Single() {
          var x = document.getElementById("id1").value;
          var elmt = document.querySelectorAll("[id='Single']");
            if (x == "Single") {
               for(var i = 0; i < elmt.length; i++) 
                 elmt[i].style.display='Block'; 
                            } 
             else for(var i = 0; i < elmt.length; i++) 
                 elmt[i].style.display='None'; 
      
        }
        function Double() {
          var x = document.getElementById("id1").value;
          var elmn = document.querySelectorAll("[id='Double']");
            if (x == "Double") {
               for(var i = 0; i < elmn.length; i++) 
                 elmn[i].style.display='Block'; 
                            } 
             else for(var i = 0; i < elmn.length; i++) 
                 elmn[i].style.display='None'; 
        }
        
      /*function Suite() {
        var x = document.getElementById("id1").value;
        var soos = document.getElementsByName('Suite');
          if (x == "Suite") {soos.style.display = "block";} 
          else soos.style.display = "none";}
          
        
        function Single() {
          var x = document.getElementById("id1").value;
         
          if (x == "Single") {document.getElementById("Single").style.display = "block";} 
          else  document.getElementById("Single").style.display = "none";
      
        }
        function Double() {
          
          var x = document.getElementById("id1").value;
          if (x == "Double") {document.getElementById("Double").style.display = "block";} 
          else document.getElementById("Double").style.display = "none";
        }*/
      
        function junior() {
        var r = document.getElementById("id3").value;
        var bl = document.querySelectorAll("[name='Junior']");  
                  
          if (r == "Junior") {
               for(var i = 0; i < bl.length; i++) 
                 bl[i].style.display='block'; 
                            } 
          else for(var i = 0; i < bl.length; i++) 
                 bl[i].style.display='None'; 
          
        }  
        function stan() {
        var r = document.getElementById("id3").value;
        var al = document.querySelectorAll("[name='Standard']");  
                  
          if (r == "Standard") {
               for(var i = 0; i < al.length; i++) 
                 al[i].style.display='block'; 
                            } 
          else for(var i = 0; i < al.length; i++) 
                 al[i].style.display='None'; 
        }
        function Bridal() {
        var r = document.getElementById("id3").value;
        var bm = document.querySelectorAll("[name='Bridal']");  
                  
          if (r == "Bridal") {
               for(var i = 0; i < bm.length; i++) 
                 bm[i].style.display='block'; 
                            } 
          else for(var i = 0; i < bm.length; i++) 
                 bm[i].style.display='None'; 
                 
          
        } 
        function Presi() {
        var r = document.getElementById("id3").value;
        var bx = document.querySelectorAll("[name='Presidential']");  
                  
          if (r == "Presidential") {
               for(var i = 0; i < bx.length; i++) 
                 bx[i].style.display='block'; 
                            } 
          else for(var i = 0; i < bx.length; i++) 
                 bx[i].style.display='None'; 
          
        } 
        function Pent() {
        var r = document.getElementById("id3").value;
        var bz = document.querySelectorAll("[name='Penthouse']");  
                  
          if (r == "Penthouse") {
               for(var i = 0; i < bz.length; i++) 
                 bz[i].style.display='block'; 
                            } 
          else for(var i = 0; i < bz.length; i++) 
                 bz[i].style.display='None'; 
          
        } 
        function honey() {
        var r = document.getElementById("id3").value;
        var by = document.querySelectorAll("[name='Honeymoon']");  
                  
          if (r == "Honeymoon") {
               for(var i = 0; i < by.length; i++) 
                 by[i].style.display='block'; 
                            } 
          else for(var i = 0; i < by.length; i++) 
                 by[i].style.display='None'; 
          
        } 
        function showI() {
        document.getElementById("confirm").style.display = "none";
      }
      
      function hideI() {
        document.getElementById("confirm").style.display = "block";
      }
      function addRows() {

        var select = document.getElementById("guetsss");
        var number = select.options[select.selectedIndex].value;
        var table = document.getElementById("table22");
        
        // Remove existing rows
        while (table.rows.length > 1) {
          table.deleteRow(1);
        }
        
        // Add new rows
        for (var i = 1; i <= number; i++) {
          var row = table.insertRow();
          var cell1 = row.insertCell(0);
          var cell2 = row.insertCell(1);
          var cell3 = row.insertCell(2);
          cell1.innerHTML = i;
          cell2.innerHTML = '<input type="text" name="gname[]" class="form-control">';
          cell3.innerHTML = '<input type="date" name="g-age[]" class="form-control">';
        }
      }
      
      function printDiv(divName) {
              var printContents = document.getElementById(divName).innerHTML;
              var originalContents = document.body.innerHTML;
              document.body.innerHTML = printContents;
              window.print();
              document.body.innerHTML = originalContents;
          }
          
           

          
      