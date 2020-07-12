  // Empty String and Null array items are ignored
  // Leading Separator is allowed
  // Trailing Separator is allowed
  // The separator should not appear multiple times between path components, but inside a component is valid


//Examples of required output

  ['abc'] => abc
  ['','abc'] => abc
  ['abc','d'] => abc/d
  ['/abc'] => /abc
  ['/abc','','d'] => /abc/d
  ['/abc','/d'] => /abc/d
  ['/abc','/d','e/'] => /abc/d/e/
  ['/abc','/d','e/','f'] => /abc/d/e/f
  ['/abc','/d',0, 'f'] => /abc/d/0/f
  ['/abc','/d',null, 'f'] => /abc/d/f
  ['abc','/d//e/','f'] => abc/d//e/f
  ['//cdn.xyz.com','images'] => //cdn.xyz.com/images
