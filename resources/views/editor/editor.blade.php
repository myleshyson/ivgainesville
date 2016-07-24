
<script type="text/javascript">
// Upload Photos
Dropzone.autoDiscover = false;
var md = new Dropzone('#photo-modal', {
url: "/home/posts/{{ $article->id }}/photos",
        maxFilesize: "5",
        addRemoveLinks: true
});




     $("[name='is_published']").bootstrapSwitch({
        state: false,
        onText: 'Publish',
        offText: 'Draft'
     });

    // Updating Publish time every minute
    setInterval(function(){

    var time = $.get('/time');
    time.done(function(data){
        $('#time').attr('value', data.time);
    });

}, 30000);

    
        

    // initializing editors
var titleEditor = new MediumEditor('.title-editable', {
   
    buttonLabels: 'fontawesome',
    placeholder: {
        text: 'Your Title'
    }, 
     toolbar: {
         buttons: ['bold', 'italic', 'underline']
     }
   
});
var autolist = new AutoList();

var bodyEditor = new MediumEditor('.body-editable', {
    buttonLabels: 'fontawesome',
    placeholder: {
        text: 'Write something amazing'
    }, 
    toolbar: {
        buttons: [
        'bold',
        'italic',
        'underline',
        'quote',
        'anchor',
        'h1',
        'h2',
        'h3',
        'removeFormat'
    ]
    },
    
    extensions: {
        'autolist': autolist
    }
});
$(function () {
    // initializing insert image on body editor
    $('.body-editable').mediumInsert({
        editor: bodyEditor,
        images: true
    });
});

var errorDiv = $('.errors');

errorDiv.hide();

// Check if Post is changing and then saves 1 second after.
var timeoutId;
$('body').on('input propertychange change', function(e){

e.preventDefault();


// Timeout function.
clearTimeout(timeoutId);
timeoutId = setTimeout(function(){
    write();
}, 500);

// Saves the data to the database 1 second after changes are made.
function write()
{

    var postTitle = titleEditor.serialize();
    var postContent = bodyEditor.serialize();
    var publish = $('#publish').attr('name');
    var published_at = '{{ $article->published_at }}';
    var is_published = false;
    var view = false;
        // Sets up Ajax header for csrf token for Laravel
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    // Pulls in the create/update code
    @yield('ajax') 	
}

 
});

$('#save').on('click', function(e){
    e.preventDefault();
    var postTitle = titleEditor.serialize();
    var postContent = bodyEditor.serialize();
    var publish = $('#publish').attr('name');
    var published_at = $('#time').val();
    var is_published = true;
    var view = true;
    $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    @yield('ajax')
});

</script> 
