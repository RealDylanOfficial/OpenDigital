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
  

  })();

// Function to add a new tag to the list
function addTag(tag: string): void {
  // Create a new li element with the tag and a remove button
  const $li: JQuery<HTMLElement> = $('<li>').addClass('tag').text(tag);
  const $removeBtn: JQuery<HTMLElement> = $('<span>').addClass('remove-btn').html('&times;');
  $li.append($removeBtn);

  // Add the li element to the tag list
  $('.tags ul').append($li);
}

const submitButton: HTMLButtonElement = document.getElementById("filter");
submitButton.addEventListener("click", (e:Event) => submitForms())


let vars: string[] = [], arg;
let args = decodeURI(window.location.href).slice(window.location.href.indexOf('?') + 1).split('&');
let queryTags: string[] = [];
for(var i = 0; i < args.length; i++)
{
    arg = args[i].split('=');
    let identifier: string = arg[0];
    if (identifier.slice(0, 4) == "tags") {
      queryTags.push(arg[1]);
    }
    vars.push(arg[0]);
    vars[arg[0]] = arg[1];
}
// console.log(args);
queryTags.forEach(tag => {
  addTag(tag);
  tags.push(tag);
});

const sortMenu: HTMLSelectElement = document.getElementById("sortSelect");

// sortMenu["value"] = vars["sort"]

sortMenu.addEventListener("change", (e:Event) => submitForms())

function submitForms(){

  let getArgs = {};

  if (tags.length > 0) {
    getArgs["tags"] = tags;
  }
  if (Object.fromEntries(new FormData(document.getElementById("dateForm"))).period != undefined) {
    getArgs["date"] = Object.fromEntries(new FormData(document.getElementById("dateForm"))).period;
  }
  if (Object.fromEntries(new FormData(document.getElementById("mediaForm"))).period != undefined) {
    getArgs["type"] = Object.fromEntries(new FormData(document.getElementById("mediaForm"))).period;
  }
  getArgs["search"] = document.getElementById("searchTerm")?.innerText

  getArgs["sort"] = document.getElementById("sortSelect")["value"]
  
  let currentURL = window.location.href.split("?")[0];
  window.location.href = currentURL + "?" + $.param(getArgs);
  
};
  
const downloadBtn = document.getElementById('download-btn');
downloadBtn.addEventListener('click', async () => {
  try {
    // get the content being displayed on the webpage
    const content = document.documentElement.outerHTML;
    const postID = $('meta[name="_postID"]').attr('content');
    const postExt = $('meta[name="_postExt"]').attr('content');
    
    // send a POST request to the Laravel backend to increment the download count
    await fetch('/increment-download-count', {
      method: 'POST',
      body: JSON.stringify({ post_id: postID }),
      headers: {
      'Content-Type': 'application/json',
      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
    });

    // trigger a file download for the content
    
    const downloadUrl = "/content/" + postID + postExt;
    const a = document.createElement('a');
    a.href = downloadUrl;
    a.download = $('meta[name="_postTitle"]').attr('content');
    document.body.appendChild(a);
    a.click();
    a.remove();
  } catch (error) {
    console.error(error);
  }
});
