function Messanger() {

	this.last = 0;
	this.timeout = 360;
	this.comet = 0;
	var self = this;
	
	this.putMessage = function(message) {
	
		self.last = message.id;
		
		var b = document.createElement('div');
		
		b.innerHTML = '<time datetime="' 
		+ message.date + 'T' + message.time 
		+ '">' + message.date + ' ' + message.time + '</time>'
		+ '<span class="username">' + message.name + '</span>'
		+ '<span class="message">' + message.text + '</span>';
		
		$('#messages').append(b);
	
	}
	
	this.parseData = function(messages) {
		
		if (!messages || messages.length < 1) return false;
		
		for (var i = 0; i < messages.length; i++) {
			
			self.putMessage(messages[i]);
			
		}
		
		setTimeout(self.connection, 1000);
		
	}
	
	this.connection = function() {
	
		self.comet = $.ajax({
		
			type: 'GET',
			url: 'showMessages.php',
			data: {'id': self.last },
			dataType: 'json',
			timeout: self.timeout * 1000,
			success: self.parseData,
			error: function() {
				
				setTimeout(self.connection, 1000);
				
			}
		
		});
	
	}
	
	this.init = function() {
	
		self.connection();
	
	}
	
	this.init();

}

function sendMessage() {

	if ($('#name').val() && $('#text').val()) {
			
		var data = {
			name: $('#name').val(),
			text: $('#text').val()
		}
		
		$.post('addMessage.php',data);
		$('#text').val('');
	} else {
	
		alert('Please fill the fields');
	
	}

}

$(document).ready(function(){

	var msg = new Messanger();
	
	$('#sendButton').click(function() {
		
		sendMessage();
		
	});

});