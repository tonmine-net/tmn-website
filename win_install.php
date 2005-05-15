<?php

require_once("docutil.php");

page_head("BOINC Windows installer");
echo "

BOINC can be installed in any of several modes:

<h2>Single-user installation</h2>
<p>
This is the recommended mode.
If you check the 'run on startup' box,
BOINC will run while you (the installing user) are logged in.
<p>
BOINC is listed in the Start menu of the installing user,
but not other users.
<p>
The 'Show graphics' command in the BOINC manager
will work only for the installing user.
The BOINC screensaver will only show application
graphics only for the installing user
(other users can run the screensaver but will see
textual information only).

<h2>Shared installation</h2>
<p>
If you check the 'run on startup' box,
BOINC runs whenever any user is logged in.
<p>
BOINC is listed in the Start menu of all users.
<p>
While BOINC is running, it runs as a particular user
(either the first user to log in, or the first to run BOINC).
The 'Show graphics' command in the BOINC manager,
will work only for this user.
The BOINC screensaver will only show application
graphics only for this user
(other users can run the screensaver but will see
textual information only).



<h2>Service installation</h2>
<p>
If you check the 'run on startup' box,
BOINC runs all the time (even when no one is logged in).
<p>
BOINC is listed in the Start menu of the installing user,
but not other users.  
<p>
The 'Show graphics' command in the BOINC manager will not work for any user.
The BOINC screensaver will only show textual information.

<h2>Customizing the installer</h2>
<p>
The new BOINC installer is an MSI package.

<h3>Active Directory Deployment</h3>

Suppose you want to modify it so that you can
deploy BOINC across a Windows network using Active Directory,
and have all the PCs attached to a particular account.
Here is how to do this:


<ul>
<li> Download the BOINC client package and execute it with the /a parameter.
<li> Drop the files to a share that can be accessed by all the computers on the network.
<li> Using <a href=http://support.microsoft.com/kb/255905/EN-US/>Microsoft ORCA</a>,
or some other MSI packaging tool, create an MSI Transform that contains the 
account_*.xml files of the projects you have already attached too on another machine
plus the following parameters:
    <ul>
    <li>Single-user install:<br>
        <table>
            <tr BGCOLOR=#d8e8ff>
                <td>Parameter</td>
                <td>Description</td>
            </tr>
            <tr valign=top>
                <td>INSTALLDIR</td>
                <td>
                    The location to install BOINC to.<br>
                    Example: 'C:\\BOINC'
                </td>
            </tr>
            <tr valign=top>
                <td>SETUPTYPE</td>
                <td>
                    The type of installation to perform.<br>
                    Valid Values: 'Single'.
                </td>
            </tr>
            <tr valign=top>
                <td>ALLUSERS</td>
                <td>
                    Whether the shortcuts appear for just one user or all users.<br>
                    Valid Values: '0' for Single.
                </td>
            </tr>
            <tr valign=top>
                <td>ENABLESCREENSAVER</td>
                <td>
                    Whether to automatically enable the screensaver.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
            <tr valign=top>
                <td>ENABLELAUNCHATLOGON</td>
                <td>
                    Whether to automatically start BOINC when the installing user or all 
                    users sign on to the computer.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
            <tr valign=top>
                <td>LAUNCHPROGRAM</td>
                <td>
                    Whether to automatically launch BOINC Manager after setup completes.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
        </table>
    <li>Shared install:<br>
        <table>
            <tr BGCOLOR=#d8e8ff>
                <td>Parameter</td>
                <td>Description</td>
            </tr>
            <tr valign=top>
                <td>INSTALLDIR</td>
                <td>
                    The location to install BOINC too.<br>
                    Example: 'C:\\BOINC'
                </td>
            </tr>
            <tr valign=top>
                <td>SETUPTYPE</td>
                <td>
                    The type of installation to perform.<br>
                    Valid Values: 'Shared'.
                </td>
            </tr>
            <tr valign=top>
                <td>ALLUSERS</td>
                <td>
                    Whether the shortcuts appear for just one user or all users.<br>
                    Valid Values: '1' for shared.
                </td>
            </tr>
            <tr valign=top>
                <td>ENABLESCREENSAVER</td>
                <td>
                    Whether to automatically enable the screensaver.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
            <tr valign=top>
                <td>ENABLELAUNCHATLOGON</td>
                <td>
                    Whether to automatically start BOINC when the installing user or all 
                    users sign on to the computer.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
            <tr valign=top>
                <td>LAUNCHPROGRAM</td>
                <td>
                    Whether to automatically launch BOINC Manager after setup completes.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
        </table>
    <li>Service Install:<br>
        <table>
            <tr BGCOLOR=#d8e8ff>
                <td>Parameter</td>
                <td>Description</td>
            </tr>
            <tr valign=top>
                <td>INSTALLDIR</td>
                <td>
                    The location to install BOINC too.<br>
                    Example: 'C:\\BOINC'
                </td>
            </tr>
            <tr valign=top>
                <td>SETUPTYPE</td>
                <td>
                    The type of installation to perform.<br>
                    Valid Values: 'Service'.
                </td>
            </tr>
            <tr valign=top>
                <td>ALLUSERS</td>
                <td>
                    Whether the shortcuts appear for just one user or all users.<br>
                    Valid Values: '1' for service.
                </td>
            </tr>
            <tr valign=top>
                <td>ENABLESCREENSAVER</td>
                <td>
                    Whether to automatically enable the screensaver.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
            <tr valign=top>
                <td>ENABLELAUNCHATLOGON</td>
                <td>
                    Whether to automatically start BOINC when the installing user or all 
                    users sign on to the computer.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
            <tr valign=top>
                <td>LAUNCHPROGRAM</td>
                <td>
                    Whether to automatically launch BOINC Manager after setup completes.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
            <tr valign=top>
                <td>SERVICE_DOMAINUSERNAME</td>
                <td>
                    Which user account should the service use.<br>
                    Valid Values: '%ComputerName%\\%UserName%'<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;%ComputerName% can be either the local computername or a domain name.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;%UserName% should be the username of the user to use.
                </td>
            </tr>
            <tr valign=top>
                <td>SERVICE_PASSWORD</td>
                <td>
                    The password for the account described in the SERVICE_DOMAINUSERNAME property.<br>
                    Valid Values: '%Password%' <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;%Password% the password for the SERVICE_DOMAINUSERNAME user account.
                </td>
            </tr>
            <tr valign=top>
                <td>SERVICE_GRANTEXECUTIONRIGHT</td>
                <td>
                    Grant the above user account the 'Logon as a Service' user right.<br>
                    Valid Values: '0' for disabled, '1' for enabled.
                </td>
            </tr>
        </table>
    </ul>
</ul>

<h3>Command line deployment</h3>

<p>An example for the single-user install would be:<br>
msiexec /i boinc.msi /qn /l c:\boincsetup.log SETUPTYPE='Single' ALLUSERS=0 ENABLESCREENSAVER=0 ENABLELAUNCHATLOGON=0 LAUCHPROGRAM=0</p>

<p>An example for the shared install would be:<br>
msiexec /i boinc.msi /qn /l c:\boincsetup.log SETUPTYPE='Shared' ALLUSERS=1 ENABLESCREENSAVER=0 ENABLELAUNCHATLOGON=0 LAUCHPROGRAM=0</p>

<p>An example for the service install would be:<br>
msiexec /i boinc.msi /qn /l c:\boincsetup.log SETUPTYPE='Service' ALLUSERS=0 ENABLESCREENSAVER=0 ENABLELAUNCHATLOGON=0 LAUCHPROGRAM=0 SERVICE_DOMAINUSERNAME='%ComputerName%\\%UserName%' SERVICE_PASSWORD='%Password%' SERVICE_GRANTEXECUTIONRIGHT=1</p>

<hr>
<h2>Technical details</h2>
<p>
BOINC's Windows installer installs several programs:
<ul>
<li> <b>core client</b>: the program that manages file transfers
and execution of applications.
<li> <b>manager</b>: the GUI to the core client.
<li> <b>screensaver</b>: a program that runs when the machine is idle.
Typically it sends a message to the core client,
telling it to do screensaver graphics.
</ul>

<h3>Single-user installation</h3>
<p>
Say the install is done by user X.
The manager runs automatically when X logs in.
The manager starts up the core client.
The core client it runs as a regular process, not a service.
If the manager crashes the core client continues to run.
The user can re-run the manager.
When the user logs out, the manager, the core client,
and any running applications exit.
<p>
Files (in the BOINC directory) are owned by user X.
<p>
Detection of mouse/keyboard is done by the manager.
<p>
The screensaver works as it currently does,
except that we'll pass window-station/desktop info
so that the password-protected screensaver mechanism will work.
<p>
Other users can't run the BOINC manager.

<h3>Shared installation</h3>

<p>
Processes run as whoever is logged in.
If someone logs in while BOINC is already running,
it will not start a new instance of BOINC.


<h3>Service installation</h3>
<p>
The core client runs as a service, started at boot time.
On Windows 2003 and greater is runs under the 'network service' account.
Otherwise it runs as the installing user.
<p>
The manager checks mouse/keyboard input
and conveys idle state to the core client.
Only the installing user can run the BOINC manager.
Files are accessable only to the installing user.



";
?>
