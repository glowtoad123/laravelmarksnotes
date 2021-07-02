<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet"
      href="markdownit/atelier-forest-light.css">
    <link rel="stylesheet" href="app.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body class="antialiased">
    <p class="welcome"><?= $user; ?></p>
    @include("components.nav")



    @foreach ($notes as $note)
   <div class="card">
    <h1 class="topic">{{ $note->title }}</h1>
    <hr />
    <input class="hiddennote" type="hidden" value={props.note} />
    <div id="note" class="note">{{ $note->note }}</div>
    <center class="bottom">
        <svg onClick={() => dispatch(setLoadingNewPageCondition())} class="mx-auto" className=" edit" width="1em" height="1em" viewBox="0 0 16 16" className="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
        </svg>
      <svg onClick={() => dispatch(setSelectedCard(props.id))} className="edit" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
      </svg>
    </center>
  </div>
    @endforeach

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/12.1.0/markdown-it.min.js" integrity="sha512-PKP2kuWuLFN4vcsGg5MQI/Z7AzGsQZGiVCpmchDik0hWie1MCx1k+lGn7YJNoU77NyufcFi2ra21exAdEIIXNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.0.1/highlight.min.js"></script>
<script type="module">
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
