import React from 'react'
import {Link} from 'react-router'

var propTypes = {};
var defaultProps = {};

var Header = React.createClass({
    render: function () {
        return <nav className="navbar navbar-default navbar-fixed-top">
            <div className="container-fluid">
                <div className="navbar-header">
                    <div id="mobile-menu">
                        <div className="left-nav-toggle">
                            <a href="#">
                                <i className="stroke-hamburgermenu"/>
                            </a>
                        </div>
                    </div>
                    <Link className="navbar-brand" to='/'>
                        <img src="/images/logo.png"/>
                    </Link>
                </div>
                <div id="navbar" className="navbar-collapse collapse">
                    <div className="left-nav-toggle">
                        <a href="#">
                            <i className="stroke-hamburgermenu"/>
                        </a>
                    </div>
                    <form className="navbar-form navbar-left">
                        <input type="text" className="form-control" placeholder="Search data for analysis" style={{width: '175px'}}/>
                    </form>
                    <ul className="nav navbar-nav navbar-right">
                        <li>
                            <a href="" >
                                Version: 1.0.0 dev
                            </a>
                        </li>
                        <li>
                            <Link to='/notifications'>
                                notifications
                                <span className="label label-warning pull-right">12</span>
                            </Link>
                        </li>
                        <li>
                            <Link to='/logout'>
                                LogOut (gevorgmansuryan@gmail.com)
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    }
});

Header.propTypes = propTypes;
Header.defaultProps = defaultProps;

module.exports = Header;