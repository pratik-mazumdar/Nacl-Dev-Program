### All codeigniter changes must be documented here.

* #### System->Form_Validation[line 548]
 from <br>
    return array_merge($callbacks,$new_rules);<br>
 to <br>
    return array_merge($new_rules,$callbacks);<br>

