import React from 'react'
import { Router, browserHistory } from 'react-router'

var propTypes = {};
var defaultProps = {};

var Dashboard = React.createClass({
    render: function () {
        return <div>
            Hello World
        </div>
    }
});

Dashboard.propTypes = propTypes;
Dashboard.defaultProps = defaultProps;

module.exports = Dashboard;