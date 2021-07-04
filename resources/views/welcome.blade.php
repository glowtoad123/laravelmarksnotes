<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Marks Notes</title>
    <link rel="stylesheet"
      href="markdownit/atelier-forest-light.css">
    <link rel="stylesheet" href="app.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">

</head>

<body class="antialiased">
    <p class="welcome"><?= $user; ?></p>
    @include("components.nav")


    <div id="cardHolder">
    @foreach ($notes as $note)
   <div class="card">
    <a href="/note/{{ $note->_id }}"><h1 class="topic">{{ $note->title }}</h1></a>
    <hr />
    <input class="hiddennote" type="hidden" value={props.note} />
    <div id="note" class="note">{{ $note->note }}</div>
    <center class="bottom">
      <a href="/edit/{{ $note->_id }}">{!! file_get_contents("pencil.svg") !!}</a>
      <a href="/delete/{{ $note->id }}">{!! file_get_contents("trash.svg") !!}</a>
    </center>
  </div>
    @endforeach
    </div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/12.1.0/markdown-it.min.js" integrity="sha512-PKP2kuWuLFN4vcsGg5MQI/Z7AzGsQZGiVCpmchDik0hWie1MCx1k+lGn7YJNoU77NyufcFi2ra21exAdEIIXNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
<script>
    var notes = document.getElementsByClassName("note")
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
    console.log("notes", notes)
    var i
    for(i = 0; i <= notes.length; i++){
        console.log(notes[i].value)
        notes[i].innerHTML = md.render(notes[i].innerHTML)
    }
</script>
</html>
