import React, {useState,useEffect, useContext} from 'react'
import axios from 'axios'
import {UserContext} from './UserContext'
import './mycss.css'
function Settings({setUser2}) {
    const value12 = useContext(UserContext);
    const [email, setEmail] = useState(value12.email2)
    const [pass, setPass] = useState("")
    const [showpass, setShowPass] = useState(false)
    const [showProfilepic, setShowProfilepic] = useState(false)
    const [fname, setFname] = useState("")
    const [lname, setLname] = useState("")
    const [address, setAddress] = useState("")
    const [selectedfile, setSelectedfile] = useState("")
    const [success, setSuccess] = useState(null)
    const getSettinginfo=(email)=>{
        axios.get('http://localhost:5000/changeaccountsetting/'+email)
            .then(response => {
                console.log(response.data)
                setPass(response.data.password)
                setLname(response.data.lastname)
                setFname(response.data.firstname)
                setEmail(response.data.email)
                setAddress(response.data.address)
            })
            .catch(function (error){
                console.log(error);
                console.log("Aey te error hai bro")
            })
    }
    const updatesetting=()=>{
        const URL = "http://localhost:5000/updatesetting";
        const data = new FormData() 
        data.append('file', selectedfile)
        data.set("email", value12.email2);
        data.set("nemail", email);
        data.set("pass", pass);
        data.set("fname", fname);
        data.set("lname", lname);
        data.set("address", address);
        axios.post(URL,data)
            .then((response) => {
                    console.log("success response: ",response.data)
                    const data2 = JSON.parse(localStorage.getItem('data'))
                    data2.fname=fname
                    data2.lname=lname
                    data2.email=email
                    localStorage.setItem('data', JSON.stringify(data2))
                    setUser2(fname+' '+lname)
                    setSuccess(response.data.message)
            }).catch((error) => {

            });
    
}
    const onIMGChangeHandler=(event)=>{

        console.log(event.target.files[0])
        setSelectedfile(event.target.files[0])
    
    }


    
    useEffect(() => {
        getSettinginfo(value12.email2)
    }, [])
    return (
        <div>
            <form>
                <h3>Update Account Settings</h3>

                <div className="form-group">
                    <label>New First name</label>
                    <input type="text" value={fname} onChange={(e)=>{setFname(e.target.value)}} className="form-control" placeholder="First name" />
                </div>

                <div className="form-group">
                    <label>New Last name</label>
                    <input type="text" value={lname} onChange={(e)=>{setLname(e.target.value)}} className="form-control" placeholder="Last name" />
                </div>

                <div className="form-group">
                    <label>New Email address</label>
                    <input type="email" value={email} onChange={(e)=>{setEmail(e.target.value)}} className="form-control" placeholder="Enter email" />
                </div>
                {showpass?
                <div className="form-group">
                    <label> New Password</label>
                    <input type="password" onChange={(e)=>{setPass(e.target.value)}} className="form-control" placeholder="Enter password" />
                </div>:
                <div style={{marginBottom:'1.5%', marginTop:'0.5'}}><a id="postforpaddingsamelinefirst" onClick={()=>{setShowPass(true)}}><strong>Change Password</strong></a><br/>
                </div>
                }
                
                <div className="form-group">
                    <label>Enter Address</label>
                    <input type="text" value={address} onChange={(e)=>{setAddress(e.target.value)}} className="form-control" placeholder="Enter Address" />
                </div>
                {showProfilepic?
                <div className="form-group">
                    <label>Upload Profile Pic</label>
                    <input type="file" name="file" onChange={onIMGChangeHandler}/>
                </div>
                :<div style={{marginBottom:'1.5%', marginTop:'0.5'}}><a id="postforpaddingsamelinefirst" onClick={()=>{setShowProfilepic(true)}}><strong>Change Profile Picture</strong></a><br/>
                </div>}

                <button type="submit" onClick={e => {e.preventDefault();updatesetting()}}  className="btn btn-primary btn-block">Update Settings</button>
                {success? <div class="alert alert-success" role="alert">{success}</div> : null}
            </form>
            
        </div>
    )
}

export default Settings
