function updateFile(theFile) {
  alert("Deseas cambiar el nombre?");
  let newName = document.forms[0].elements["newName"].value;
  if (newName) {
    alert("Deseas cambiar el nombre?");
    window.location.href =
      "?folder=<?=$theFolder?>&op=rename&file=" +
      theFile +
      "&newName=" +
      newName;
  }
}
