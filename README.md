# Search By Component ID (nz.co.fuzion.idsearch)

Adds id element on all search forms which allows the user to search by its value.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v5.4+
* CiviCRM (*FIXME: Version number*)

## Installation (Web UI)

This extension has not yet been published for installation via the web UI.

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl nz.co.fuzion.idsearch@https://github.com/FIXME/nz.co.fuzion.idsearch/archive/master.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/FIXME/nz.co.fuzion.idsearch.git
cv en idsearch
```

## Usage

After installation, navigate to the search forms and start searching with the id value. CiviCRM already provides the id element on few forms, eg Membership. With this extension, you can find the id element on Activity, Contribution, Pledge, Participant, Mailing & Event search forms as well.