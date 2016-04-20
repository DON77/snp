import React from 'react'
import Button from './components/button.jsx'

var propTypes = {};
var defaultProps = {};

var Main = React.createClass({
    render: function () {
        return <div className="wrapper">
            <div className="content">
                <div className="container-fluid">
                    <div className="row">
                        <Button href='/hello-world' type="success">hello-world</Button>
                        <Button href='/login' type="success">Login</Button>
                    </div>
                </div>
            </div>
        </div>
    }
});

Main.propTypes = propTypes;
Main.defaultProps = defaultProps;

module.exports = Main;