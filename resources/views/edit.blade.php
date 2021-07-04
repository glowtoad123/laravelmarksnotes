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
    @if ($note->user === $user)
    <form id="createCard" action="/api/notes/{{ $note->_id }}" method="post">
        @method("PUT")
        <input id="createtopic" type="text" placeholder="title" name="title" value="{{ $note->title }}">
        <textarea onkeyup="parseNote(event)" id="createnote" type="text" placeholder="note" name="note">{{ $note->note }}</textarea>
        <input type="hidden" name="user" value=<?= $user; ?> >
        <input type="hidden" name="id" value=<?= $note->_id; ?> >
        <div id="noteOutput"></div>
        <button onsubmit="toNote(event)" type="submit" id="submit">Update</button>
    </form>
        @endif
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/12.1.0/markdown-it.min.js" integrity="sha512-PKP2kuWuLFN4vcsGg5MQI/Z7AzGsQZGiVCpmchDik0hWie1MCx1k+lGn7YJNoU77NyufcFi2ra21exAdEIIXNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
<script>
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
    var noteOutput = document.getElementById("noteOutput")
    var note = document.getElementById("createnote")
    console.log("notes", note)

    function parseNote(event) {
        console.log("parseNote is being used")
        noteOutput.innerHTML = md.render(event.target.value)
    }

    noteOutput.addEventListener("click", parseNote)

    /* function toNote(event) {
        event.preventDefault()
        console.log("function has been bound")
    } */
</script>

</html>
