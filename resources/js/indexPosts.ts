import $ from "jquery";

let tags: string[] = [];

(function() {
    // Handle tag form submission
    $('#tagForm').on('submit', function(event: JQuery.Event) {
      // Prevent the default form submission behavior
      event.preventDefault();
      
      // Get the tag value from the input field
      const tag: string = $('#tagInput').val().trim();
  
      // If the tag is not empty, add it to the tag list and clear the input field
      if (tag !== '') {
        tags.push(tag)
        addTag(tag);
        $('#tagInput').val('');
      }
    });
  
    // Handle click on remove button for tags
    $('.tags').on('click', '.remove-btn', function() {
      tags.splice(tags.indexOf($(this).parent().text().slice(0, -1)), 1);
      $(this).parent().remove();
    });
  
    // Function to add a new tag to the list
    function addTag(tag: string): void {
      // Create a new li element with the tag and a remove button
      const $li: JQuery<HTMLElement> = $('<li>').addClass('tag').text(tag);
      const $removeBtn: JQuery<HTMLElement> = $('<span>').addClass('remove-btn').html('&times;');
      $li.append($removeBtn);
  
      // Add the li element to the tag list
      $('.tags ul').append($li);
    }
  })();

const submitButton: HTMLButtonElement = document.getElementById("filter");
submitButton.addEventListener("click", (e:Event) => submitForms())

function submitForms(){
  // const form1: HTMLFormElement = document.getElementById("tagForm");
  const form2: HTMLFormElement = document.getElementById("dateForm");
  const form3: HTMLFormElement = document.getElementById("mediaForm");


  let getArgs: string = "";
  if(tags.length > 0){
  getArgs = "tags=";
  for (let index = 0; index < tags.length; index++) {
    getArgs += tags[index];
    if (index != tags.length - 1) {
      getArgs += ",";
    }
  }}

  let elements = Object.fromEntries(new FormData(document.getElementById("dateForm")));
  if(elements.period != null){
    if(getArgs != ""){
      getArgs += "&";
    }
    getArgs += "date=";
    getArgs += elements.period;
  }

  let elements2 = Object.fromEntries(new FormData(document.getElementById("mediaForm")));
  if(elements2.period != null){
    if(getArgs != ""){
      getArgs += "&";
    }
    getArgs += "type=";
    getArgs += elements2.period;
  }

  let currentURL = window.location.href.split("?")[0];
  window.location.href = currentURL + "?" + getArgs;

  
}
  