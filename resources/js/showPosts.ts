import $ from "jquery";
const downloadBtn = document.getElementById('download-btn');

// add a click event listener to the download button
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

