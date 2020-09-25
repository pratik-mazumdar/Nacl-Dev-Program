### All codeigniter changes must be documented here.

* #### System->Form_Validation[line 548]
 from 
    return array_merge($callbacks,$new_rules);
 to 
    return array_merge($new_rules,$callbacks);

