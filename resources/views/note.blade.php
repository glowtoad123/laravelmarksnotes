<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../markdownit/atelier-forest-light.css">
    <link rel="stylesheet" href="../app.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.svg" type="image/x-icon">
    <title>{{ $note->title }}</title>
</head>
<body>
    @include('components.nav')
    <div class="bigCard">
        <h1 class="topic">{{ $note->title }}</h1>
        <hr />
        <input type="hidden" id="hiddennote" value={card.note} />
        <div id="bigNote" class="note">{{ $note->note }}</div>
        <center>
            <a href="../edit/{{ $note->_id }}">
              {!! file_get_contents("pencil.svg") !!}
            </a>
        </center>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/12.1.0/markdown-it.min.js" integrity="sha512-PKP2kuWuLFN4vcsGg5MQI/Z7AzGsQZGiVCpmchDik0hWie1MCx1k+lGn7YJNoU77NyufcFi2ra21exAdEIIXNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
<script type="module">
    var md = window.markdownit({
        highlight: function (str, lang) {
          if (lang && hljs.getLanguage(lang)) {
            try {
              return '<pre class="hljs"><code>' +
                     hljs.highlight(lang, str, true).value +
                     '</code></pre>';
            } catch (err) {console.log(err)}
          }

          return '<pre class="hljs"><code>' + md.utils.escapeHtml(str) + '</code></pre>';
        }
      })
    var note = document.getElementById("bigNote")
    console.log("notes", note)
    note.innerHTML = md.render(note.innerHTML)
</script>
</html>
