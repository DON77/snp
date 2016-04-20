import React from 'react'
import {Link} from 'react-router'

var propTypes = {};
var defaultProps = {};

var Error = React.createClass({
    data: function () {
        var error = {};
        switch (this.props.route.path) {
            default:
                error.code = 404;
                error.title = 'Page Not Found';
                error.message = 'Sorry, but the page you are looking for has not been found. Try checking the URL for error, then hit the refresh button on your browser or try found something else in our app.';
        }
        return error;
    },
    render: function () {
        var error = this.data();
        return <section className="content content-fixed">
            <div className="container-center md animated slideInDown">
                <div className="view-header">
                    <div className="header-icon">
                        <i className="pe page-header-icon pe-7s-close-circle"/>
                    </div>
                    <div className="header-title">
                        <h3>{error.code}</h3>
                        <small>
                            {error.title}
                        </small>
                    </div>
                </div>
                <div className="panel panel-filled">
                    <div className="panel-body">
                        {error.message}
                    </div>
                </div>
                <div>
                    <Link to='/' className="btn btn-accent">Back to app</Link>
                </div>
            </div>
        </section>
    }
});

Error.propTypes = propTypes;
Error.defaultProps = defaultProps;

module.exports = Error;