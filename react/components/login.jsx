import React from 'react'
import {Navigation} from 'react-router'

var propTypes = {};
var defaultProps = {};

var Login = React.createClass({
    mixins: [Navigation],
    componentWillMount: function () {
        sessionStorage.removeItem('user');
        this.transitionTo('/login')
    },
    componentDidMount: function() {
        Settings.setTitle('Login');
    },
    _submit: function (e) {
        Pace.restart();
        e.preventDefault();
        $.post(Settings.apiUrl + '/user/signin', $(e.target).serialize(), function(data) {
            if (data.success) {
                sessionStorage.user = data;
                this.transitionTo('/')
            } else {
                var errors = data.data.map(function (error) {
                    return error.message;
                });
                toastr.error(errors.join('\n'), 'Error');
            }
        }.bind(this), "json");
    },
    render: function () {
        return <section className="content content-fixed">
            <div className="container-center animated slideInDown">
                <div className="view-header">
                    <div className="header-icon">
                        <i className="pe page-header-icon pe-7s-unlock"/>
                    </div>
                    <div className="header-title">
                        <h3>Login</h3>
                        <small>
                            Please enter your credentials to login.
                        </small>
                    </div>
                </div>
                <div className="panel panel-filled">
                    <div className="panel-body">
                        <form onSubmit={this._submit} noValidate>
                            <div className="form-group">
                                <label className="control-label" htmlFor="username">Username</label>
                                <input type="text" placeholder="example@gmail.com" title="Please enter you username" name="username" id="username" className="form-control"/>
                                    <span className="help-block small">Your unique username to app</span>
                            </div>
                            <div className="form-group">
                                <label className="control-label" htmlFor="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" name="password" id="password" className="form-control"/>
                                    <span className="help-block small">Your strong password</span>
                            </div>
                            <div>
                                <button className="btn btn-accent">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    }
});

Login.propTypes = propTypes;
Login.defaultProps = defaultProps;

module.exports = Login;

function YtInfo(url)
{
    $.get('https://www.youtube.com/oembed?url=' + url +'&format=json', function(data) {
        return data
    });
}