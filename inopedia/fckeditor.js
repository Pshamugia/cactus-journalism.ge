var FCKeditor = function( instanceName, width, height, toolbarSet, value )
{
	this.InstanceName	= instanceName ;
	this.Width			= width			|| '600' ;
	this.Height			= height		|| '400' ;
	this.ToolbarSet		= toolbarSet	|| 'Default' ;
	this.Value			= value			|| '' ;
	this.BasePath		= '/editor/' ;
	this.CheckBrowser	= true ;
	this.DisplayErrors	= true ;
	this.EnableSafari	= true ;
	this.EnableOpera	= true ;

	this.Config			= new Object() ;
	this.OnError		= null ;
}

FCKeditor.prototype.Version			= '2.4' ;
FCKeditor.prototype.VersionBuild	= '1148' ;

FCKeditor.prototype.Create = function()
{
	document.write( this.CreateHtml() ) ;
}

FCKeditor.prototype.CreateHtml = function()
{
	if ( !this.InstanceName || this.InstanceName.length == 0 )
	{
		this._ThrowError( 701, 'You must specify an instance name.' ) ;
		return '' ;
	}

	var sHtml = '<div>' ;

	if ( !this.CheckBrowser || this._IsCompatibleBrowser() )
	{
		sHtml += '<input type="hidden" id="' + this.InstanceName + '" name="' + this.InstanceName + '" value="' + this._HTMLEncode( this.Value ) + '" style="display:none" />' ;
		sHtml += this._GetConfigHtml() ;
		sHtml += this._GetIFrameHtml() ;
	}
	else
	{
		var sWidth  = this.Width.toString().indexOf('%')  > 0 ? this.Width  : this.Width  + 'px' ;
		var sHeight = this.Height.toString().indexOf('%') > 0 ? this.Height : this.Height + 'px' ;
		sHtml += '<textarea name="' + this.InstanceName + '" rows="4" cols="40" style="width:' + sWidth + ';height:' + sHeight + '">' + this._HTMLEncode( this.Value ) + '<\/textarea>' ;
	}

	sHtml += '</div>' ;
	
	return sHtml ;
}

FCKeditor.prototype.ReplaceTextarea = function()
{
	if ( !this.CheckBrowser || this._IsCompatibleBrowser() )
	{
		var oTextarea = document.getElementById( this.InstanceName ) ;
		var colElementsByName = document.getElementsByName( this.InstanceName ) ;
		var i = 0;
		while ( oTextarea || i == 0 )
		{
			if ( oTextarea && oTextarea.tagName.toLowerCase() == 'textarea' )
				break ;
			oTextarea = colElementsByName[i++] ;
		}
		
		if ( !oTextarea )
		{
			alert( 'Error: The TEXTAREA with id or name set to "' + this.InstanceName + '" was not found' ) ;
			return ;
		}

		oTextarea.style.display = 'none' ;
		this._InsertHtmlBefore( this._GetConfigHtml(), oTextarea ) ;
		this._InsertHtmlBefore( this._GetIFrameHtml(), oTextarea ) ;
	}
}

FCKeditor.prototype._InsertHtmlBefore = function( html, element )
{
	if ( element.insertAdjacentHTML )
		element.insertAdjacentHTML( 'beforeBegin', html ) ;
	else
	{
		var oRange = document.createRange() ;
		oRange.setStartBefore( element ) ;
		var oFragment = oRange.createContextualFragment( html );
		element.parentNode.insertBefore( oFragment, element ) ;
	}
}

FCKeditor.prototype._GetConfigHtml = function()
{
	var sConfig = '' ;
	for ( var o in this.Config )
	{
		if ( sConfig.length > 0 ) sConfig += '&amp;' ;
		sConfig += encodeURIComponent( o ) + '=' + encodeURIComponent( this.Config[o] ) ;
	}

	return '<input type="hidden" id="' + this.InstanceName + '___Config" value="' + sConfig + '" style="display:none" />' ;
}

FCKeditor.prototype._GetIFrameHtml = function()
{
	var sFile = 'fckeditor.html' ;
	
	try
	{
		if ( (/fcksource=true/i).test( window.top.location.search ) )
			sFile = 'fckeditor.original.html' ;
	}
	catch (e) { /* Ignore it. Much probably we are inside a FRAME where the "top" is in another domain (security error). */ }

	var sLink = this.BasePath + 'editor/' + sFile + '?InstanceName=' + encodeURIComponent( this.InstanceName ) ;
	if (this.ToolbarSet) sLink += '&amp;Toolbar=' + this.ToolbarSet ;

	return '<iframe id="' + this.InstanceName + '___Frame" src="' + sLink + '" width="' + this.Width + '" height="' + this.Height + '" frameborder="0" scrolling="no"></iframe>' ;
}

FCKeditor.prototype._IsCompatibleBrowser = function()
{
	return FCKeditor_IsCompatibleBrowser( this.EnableSafari, this.EnableOpera ) ;
}

FCKeditor.prototype._ThrowError = function( errorNumber, errorDescription )
{
	this.ErrorNumber		= errorNumber ;
	this.ErrorDescription	= errorDescription ;

	if ( this.DisplayErrors )
	{
		document.write( '<div style="COLOR: #ff0000">' ) ;
		document.write( '[ FCKeditor Error ' + this.ErrorNumber + ': ' + this.ErrorDescription + ' ]' ) ;
		document.write( '</div>' ) ;
	}

	if ( typeof( this.OnError ) == 'function' )
		this.OnError( this, errorNumber, errorDescription ) ;
}

FCKeditor.prototype._HTMLEncode = function( text )
{
	if ( typeof( text ) != "string" )
		text = text.toString() ;

	text = text.replace(
		/&/g, "&amp;").replace(
		/"/g, "&quot;").replace(
		/</g, "&lt;").replace(
		/>/g, "&gt;") ;

	return text ;
}

function FCKeditor_IsCompatibleBrowser( enableSafari, enableOpera )
{
	var sAgent = navigator.userAgent.toLowerCase() ;

	if ( sAgent.indexOf("msie") != -1 && sAgent.indexOf("mac") == -1 && sAgent.indexOf("opera") == -1 )
	{
		var sBrowserVersion = navigator.appVersion.match(/MSIE (.\..)/)[1] ;
		return ( sBrowserVersion >= 5.5 ) ;
	}

	if ( navigator.product == "Gecko" && navigator.productSub >= 20030210 && !( typeof(opera) == 'object' && opera.postError ) )
		return true ;

	if ( enableOpera && navigator.appName == 'Opera' && parseInt( navigator.appVersion, 10 ) >= 8 )
			return true ;

	if ( enableSafari && sAgent.indexOf( 'safari' ) != -1 )
		return ( sAgent.match( /safari\/(\d+)/ )[1] >= 312 ) ;

	return false ;
}