import React from 'react'

var propTypes = {};
var defaultProps = {};

var Navigation = React.createClass({
    render: function () {
        return <aside className="navigation">
            <nav>
                <ul className="nav luna-nav">
                    <li className="nav-category">
                        Main
                    </li>
                    <li>
                        <a href="index-2.html">Dashboard</a>
                    </li>

                    <li>
                        <a href="#monitoring" data-toggle="collapse" aria-expanded="false">
                            Monitoring<span className="sub-nav-icon"> <i className="stroke-arrow"/> </span>
                        </a>
                        <ul id="monitoring" className="nav nav-second collapse">
                            <li><a href="metrics.html"> Metrics</a></li>
                            <li><a href="usage.html"> Usage</a></li>
                            <li><a href="activity.html"> Activity</a></li>
                        </ul>
                    </li>
                    <li className="nav-category">
                        UI Elements
                    </li>
                    <li className="active">
                        <a href="#uielements" data-toggle="collapse" aria-expanded="false">
                            General<span className="sub-nav-icon"> <i className="stroke-arrow"/> </span>
                        </a>
                        <ul id="uielements" className="nav nav-second collapse in">
                            <li><a href="panels.html">Panels</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li className="active"><a href="icons.html">Icons</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="tabs.html">Tabs</a></li>
                            <li><a href="modals.html">Modals</a></li>
                            <li><a href="alerts.html">Alerts</a></li>
                            <li><a href="gridSystem.html">Grid system</a></li>
                            <li><a href="draggable.html">Draggable</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#tables" data-toggle="collapse" aria-expanded="false">
                            Tables design<span className="sub-nav-icon"> <i className="stroke-arrow"/> </span>
                        </a>
                        <ul id="tables" className="nav nav-second collapse">
                            <li><a href="tableStyles.html">Table styles</a></li>
                            <li><a href="dataTables.html">Data Tables</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="formElements.html"> Form elements </a>
                    </li>
                    <li>
                        <a href="#charts" data-toggle="collapse" aria-expanded="false">
                            Charts and graphs<span className="sub-nav-icon"> <i className="stroke-arrow"/> </span>
                        </a>
                        <ul id="charts" className="nav nav-second collapse">
                            <li><a href="flotCharts.html">Flot charts</a></li>
                            <li><a href="sparkline.html">Sparkline</a></li>
                        </ul>
                    </li>

                    <li className="nav-category">
                        App Pages
                    </li>

                    <li>
                        <a href="#extras" data-toggle="collapse" aria-expanded="false">
                            Basic <span className="sub-nav-icon"> <i className="stroke-arrow"/> </span>
                        </a>
                        <ul id="extras" className="nav nav-second collapse">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="support.html">Support</a></li>
                            <li><a href="nestableList.html">List</a></li>
                            <li><a href="timeline.html">Timeline</a></li>

                        </ul>
                    </li>
                    <li>
                        <a href="#common" data-toggle="collapse" aria-expanded="false">
                            Common <span className="sub-nav-icon"> <i className="stroke-arrow"/> </span>
                        </a>
                        <ul id="common" className="nav nav-second collapse">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                            <li><a href="forgotPassword.html">Forgot password</a></li>
                            <li><a href="error.html">Error page</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="versions.html">
                            <span className="badge pull-right">2</span>
                            Versions
                        </a>
                    </li>
                    <li className="nav-info">
                        <i className="pe pe-7s-shield text-accent"/>
                        <div className="m-t-xs">
                            <span className="c-white">AOD CRM </span>Version 1.0.0 dev
                        </div>
                    </li>
                </ul>
            </nav>
        </aside>
    }
});

Navigation.propTypes = propTypes;
Navigation.defaultProps = defaultProps;

module.exports = Navigation;