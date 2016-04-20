import React from 'react'
import ReactDom from 'react-dom'
import { Router, IndexRoute, Route, Link, browserHistory, Redirect } from 'react-router'
import Settings from './settings'

global.Settings = Settings;
//layout
import Header from './layout/header'
import Navigation from './layout/navigation'

//components
import Main from './main.jsx'
import Login from './components/login.jsx'
import Error from './components/error.jsx'

var App = React.createClass({
    componentWillMount: function () {
        if (!sessionStorage.user) {
            browserHistory.push('/login')
        }  
    },
    render: function () {
        return <div className='wrapper'>
            <Header />
            <Navigation />
            <section className="content">
                <div className="container-fluid">
                    {this.props.children}
                </div>
            </section>
        </div>
    }
});
// <Route path="notifications" component={Notifications}/>

ReactDom.render((
    <Router history={browserHistory}>
        <Route path={Settings.baseUrl+'/'} component={App}>
            <IndexRoute component={Main}/>
            
        </Route>
        <Route path="/not-found" component={Error}/>
        <Route path="/logout" component={Login}/>
        <Route path="/login" component={Login}/>
        <Redirect from="*" to="/not-found" />
    </Router>
), document.getElementById('app'));