<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>APOD API Demo</title>
</head>
<body>
  <h1>Astronomy Picture of the Day</h1>

  <div>
    <label for="date-input">Select Date:</label>
    <input type="date" id="date-input">
    <button onclick="fetchApodData()">Get APOD</button>
  </div>

  <div id="apod-container" style="display: none;">
    <h2 id="apod-title"></h2>
    <img id="apod-image" src="" alt="APOD">
    <p id="apod-description"></p>
    <p>Date: <span id="apod-date"></span></p>
    <p>Media Type: <span id="apod-media-type"></span></p>
    <p>Original URL: <a id="apod-original-url" href="" target="_blank"></a></p>
  </div>

  <script>
    function fetchApodData() {
      var date = document.getElementById('date-input').value;
      
      // Fetch APOD data from the API for the selected date
      fetch(`https://api.nasa.gov/planetary/apod?api_key=t7oK25BPaBQ1ekQP8R3qchd0au4PhiuOpCcdOSZd&date=${date}`)
        .then(response => response.json())
        .then(data => {
          // Display the APOD data in the HTML elements
          document.getElementById('apod-title').innerText = data.title;
          document.getElementById('apod-image').src = data.url;
          document.getElementById('apod-description').innerText = data.explanation;
          document.getElementById('apod-date').innerText = data.date;
          document.getElementById('apod-media-type').innerText = data.media_type;
          document.getElementById('apod-original-url').href = data.hdurl;
          document.getElementById('apod-original-url').innerText = data.hdurl;

          // Show the APOD container
          document.getElementById('apod-container').style.display = 'block';
        })
        .catch(error => {
          console.log('An error occurred while fetching APOD data:', error);
        });
    }
  </script>
</body>
</html>
