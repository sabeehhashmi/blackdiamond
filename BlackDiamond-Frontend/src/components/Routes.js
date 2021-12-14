import React, { useContext , useEffect, useState } from 'react'
import "bootstrap/dist/css/bootstrap.min.css";


import { BrowserRouter as Router, Switch, Route, Link,withRouter, useHistory, Redirect } from "react-router-dom";

import NabBar2 from './NavBar2'
import Settings from './Settings'
import {UserContext} from './UserContext'
import ForgetPassword from './Authentication/ForgetPassword';
import ResetPassword from './Authentication/ResetPassword';
import NewSignUpForm from './Authentication/NewSignUpForm';
import NewLoginForm from './Authentication/NewLoginForm'
import AddNewProperty from './AddNewProperty/AddNewProperty'
import Home from './Home/Home'
import Footer from './Footer/Footer'
import SellerProfile from './SellerProfile/SellerProfile';
/* 
import Template from './Template';
import OurServices from './OurServices';
import LatestProperties from './LatestProperties';
import BestAgent from './BestAgent'; */
//export const UserContext = React.createContext()
function Routes(props) {
  const [loggeduser, setloggeduser] = useState(null);
  const [isadmin, setIsadmin] = useState(false);
  const [favs, setFavs] = useState([]);
  const [cart, setCart] = useState(null);
  const [following, setFollowing] = useState([]);
  const [islogged, setIslogged] = useState(false);
  const [type, setType] = useState(null);
  let history = useHistory();
  const [test, setTest]= useState(null)
  const updatefavs=(upfavs)=>{ 
    console.log("Updating favs: ",upfavs)
    const data = JSON.parse(localStorage.getItem('data'))
    console.log("Local Storage: ",data)
    data.favs=upfavs
    localStorage.setItem('data', JSON.stringify(data))
    setFavs(upfavs)
  }
  const updatefollowing=(following)=>{
    console.log("Updating following: ",following)
    const data = JSON.parse(localStorage.getItem('data'))
    console.log("Local Storage: ",data)
    data.following=following
    localStorage.setItem('data', JSON.stringify(data))
    setFollowing(following)
  }
  const updatecart=(cart)=>{
    console.log("Updating cart: ",cart)
    const data = JSON.parse(localStorage.getItem('data'))
    console.log("Local Storage: ",data)
    data.cart=cart
    localStorage.setItem('data', JSON.stringify(data))
    setCart(cart)
  }
  
  
  useEffect(() => {
    
    
  },[test]);
  const logout=()=>{
    setIslogged(false)
    setloggeduser(null)
    localStorage.clear();
    setTest(test+1)
  }
  
  
  const value12 = {
    loggeduser: loggeduser,
    islogged: islogged,
    type: type,
    following: following,
    favs: favs,
    updatefavs: updatefavs,
    updatefollowing: updatefollowing,
    updatecart: updatecart,
    isadmin: isadmin,
    cart: cart
  }
    return (<Router>
        <div id="main-wrapper">
                <>
                {/* <NabBar2 credits={credits} type={type} islogged={islogged} setIsadmin={setIsadmin} isadmin={isadmin} user3={user3} user2={user2} logout={logout} userid={userid} />
                <Navbar3 credits={credits} type={type} islogged={islogged} setIsadmin={setIsadmin} isadmin={isadmin} user3={user3} user2={user2} logout={logout} userid={userid} /> */}
                
                <NabBar2 loggeduser={loggeduser} islogged={islogged} />
                <br></br>
                <br></br>
                  
                    <Switch>
                    <UserContext.Provider value={ value12 }>
                      <Route exact path="/" >
                      
                      <Home />
                      
                      </Route> 
                      
                      
                        <Route path="/sign-in">
                          <NewLoginForm setIslogged={setIslogged} setloggeduser={setloggeduser} />
                        </Route>
                        <Route path="/sign-up">
                          <NewSignUpForm />
                        </Route>
                        <Route path="/addnewproperty">
                          <AddNewProperty />
                        </Route>
                        <Route path="/sellerprofile" component={SellerProfile}/>
                        <Route path="/forgetpassword" component={ForgetPassword}/>
                        <Route path="/reset" component={ResetPassword}/>
                        <Route path="/settings" >
                          <Settings />
                        </Route>
                        
                      </UserContext.Provider>
                    </Switch>
                    <Footer />
                        
                    
              </>
            
        </div></Router>
    )
}

export default Routes
