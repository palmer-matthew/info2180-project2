# INFO2180 Project 2

This is a short guide for contributing to the repository:

- The main branch of the repository will be used to house the most stable code of the project. So no one should push to the main branch until it has been fully tested.
- You can fork the repository, clone the forked reposiroty to your computer before  making changes to that version of the repository. When you're sure of the update then you can push to this repository.

Check if this repository is listed as the upstream to your forked repository using:

```
git remote -v
```

If it is not listed then you can set it using:

```
git remote add upstream https://github.com/palmer-matthew/info2180-project2.git
```

It would be a good idea to keep a local stable branch of the project code on your local repository. This would minimize the risk of any clashes in versions while coding even if we are working on separate aspects of the project.

