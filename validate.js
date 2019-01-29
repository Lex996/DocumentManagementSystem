
    function ValidateForm() {
    var Check = 0;
    if (document.goo.uploaded_file.value == '') { Check = 1; }
    if (document.goo.Section.value == '') { Check = 1; }
    if (document.goo.Sibject.value == '') { Check = 1; }
    if (document.goo.RefNo.value == '') { Check = 1; }
    if (document.goo.Company.value == '') { Check = 1; }
    if (document.goo.Employee.value == '') { Check = 1; }
    if (document.goo.Date.value == '') { Check = 1; }
    if (document.goo.Document.value == '') { Check = 1; }
    if (Check == 1) {
        alert(" All fields are required ");
        return false;
    } else {
        document.goo.submit.disabled = true;
        return true;
        }
    }
    
    function dont(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
    }
