import React from 'react'
import classNames from 'classnames'
import {Router, Route, Link} from 'react-router'

var propTypes = {};
var defaultProps = {};

var Button = React.createClass({
    render: function () {
        var classes = classNames('btn', 'btn-w-md', {
            'btn-default': !this.props.type,
            'btn-primary': this.props.type == 'primary',
            'btn-success': this.props.type == 'success',
            'btn-info': this.props.type == 'info',
            'btn-warning': this.props.type == 'warning',
            'btn-danger': this.props.type == 'danger',
            'btn-square': this.props.square,
            'btn-rounded': this.props.rounded
        });
        return <Link to={this.props.href} className={classes}>{this.props.children}</Link>
    }
});

Button.propTypes = propTypes;
Button.defaultProps = defaultProps;

module.exports = Button;