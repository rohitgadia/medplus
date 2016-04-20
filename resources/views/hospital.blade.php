@extends('layouts.master')
@section('headlinks')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react-dom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
@endsection
@section('content')
@foreach($datas as $data)
	<center><h2>{{$data->HospitalName}}</h2></center>
	<hr/>
	<center><p class="hospital--address">{!!preg_replace('/[^A-Za-z0-9\-#,\'".]/',' ',$data->Address)!!}</p></center>
	<br>
	<center><p class="hospital--contact">${{$data->Contact_info}}</p></center>
	<br>
	<center><p class="hospital--speciality">{{$data->Speciality}}</p></center>
	<br>
@endforeach
<div id="content"></div>
<br>
    <script type="text/babel">
	var Comment = React.createClass({
      	rawMarkup: function() {
			    var rawMarkup = marked(this.props.children.toString(), {sanitize: true});
			    return { __html: rawMarkup };
			  },
      	render: function(){
      		return (
      		<div className="comment">
      			<h3 className="commentAuthor">
      				{this.props.author}
      			</h3>
      			<span dangerouslySetInnerHTML={this.rawMarkup()} />
      		</div>
      		);
      	}
      });
	 var CommentList = React.createClass({
      	render: function(){
      		var commentNodes = this.props.data.map(function(comment)
      		{
      		return (
      			<Comment author={comment.author} key = {comment.id}>
      				{comment.text}
      			</Comment>
      			);
      		});
      		return (
      			<div className="CommentList">
      				{commentNodes}
      			</div>
      			);
      	}
      });
      var CommentForm = React.createClass({
      	getInitialState: function(){
      		return {author:'',text:''};
      	},
      	handleAuthorChange: function(e){
      		this.setState({author: e.target.value});
      	},
      	handleTextChange: function(e){
      		this.setState({text: e.target.value});
      	},
      	handleSubmit: function(e){
      		e.preventDefault();
      		var author = this.state.author.trim();
      		var text = this.state.text.trim();
      		if(!author || !text)
      			return;
      		this.props.onCommentSubmit({author:author,text:text});
      		this.setState({author:'',text:''});
      	},
      	render: function(){
      		return (
      			<form className="commentForm" onSubmit={this.handleSubmit}>
      				<input type="text" placeholder="Your name" value={this.state.author} onChange={this.handleAuthorChange} autoComplete="on" id="commentName"/>
      				<input type="text" placeholder="Say something.." value={this.state.text} onChange={this.handleTextChange} id="commentText"/>
      				<input type="submit" value="Post" />
      			</form>
      			);
      		}
      });
      var CommentBox = React.createClass({
      	loadCommentsFromServer: function(){
      		$.ajax({
      			url : this.props.url,
      			datatype : 'json',
      			cache : false,
      			success : function(data) {
      				this.setState({data:data});
      			}.bind(this),
      			error : function(xhr,status,err) {
      				console.error(this.props.url,status,err.toString());
      			}.bind(this)
      		});
      	},
      	handleCommentSubmit: function(comment){
      		$.ajax({
		      url: this.props.url,
		      datatype: 'json',
		      type: 'POST',
		      data: comment,
		      success: function(data) {
		        this.setState({data: data});
		      }.bind(this),
		      error: function(xhr, status, err) {
		        console.error(this.props.url, status, err.toString());
		      }.bind(this)
		    });
      	},
      	getInitialState: function(){
      		return {data:[]};
      	},
      	componentDidMount: function(){
      		this.loadCommentsFromServer();
      		setInterval(this.loadCommentsFromServer,this.props.pollInterval);
      	},
      	render: function(){
      		return (
      			<div className="CommentBox">
	      			<h2>Comments</h2>
	      			<CommentList data={this.state.data} />
	      			<CommentForm onCommentSubmit={this.handleCommentSubmit} />
      			</div>
      			);
      	}
      });
      ReactDOM.render(
      	<CommentBox url="http://medplus.dev/api/comments/{{$locality}}/{{$id}}" pollInterval={2000} />,
      	document.getElementById('content')
      	);
    </script>
@endsection
