<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload MP4 Video</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
        }
        video {
            margin-top: 20px;
            max-width: 100%;
        }
    </style>
</head>
<body>

<h2>Select MP4 Video</h2>

<input type="file" id="videoInput" accept="video/mp4">

<video id="videoPlayer" controls></video>

<script>
document.getElementById("videoInput").addEventListener("change", function (event) {
    const file = event.target.files[0];

    if (file && file.type === "video/mp4") {
        const videoURL = URL.createObjectURL(file);
        document.getElementById("videoPlayer").src = videoURL;
    } else {
        alert("Please select an MP4 video");
    }
});
</script>

</body>
</html>
