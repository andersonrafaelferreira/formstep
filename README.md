# formstep

EshowsController.controller("video", function(
  $rootScope,
  $window,
  $ionicTabsDelegate,
  $scope,
  $state,
  $timeout,
  $interval,
  $ionicLoading,
  $stateParams,
  $location,
  $ionicModal,
  $ionicScrollDelegate,
  $ionicActionSheet,
  $ionicSlideBoxDelegate,
  Camera,
  appAlert,
  sessionService,
  webRequest,
  pageBack
) {
  $scope.params = $stateParams.id;
  console.log($scope.params);

  $scope.video = {};

  $scope.clientSideList = [
    { text: "Youtube", value: "youtube" },
    { text: "Vimeo", value: "vimeo" }
  ];

  if ($scope.params !== "new") {
    $scope.video = {
      title: "videozao do canal",
      description: "meu vídeo de sucesso",
      platform: "vimeo",
      main: false,
      url: "https://www.youtube.com/watch?v=Y6dpgd4hWMQ&t=257s"
    };
  }

  $scope.selectedPlatform = function(select) {
    console.log(select);
    $scope.video.platform = select;
  };
  $scope.data = {
    clientSide: $scope.video.platform
  };

  $scope.update = function() {
    console.log("atualizar", $scope.video);
  };
  $scope.create = function() {
    console.log("criar", $scope.video);
  };

  console.log("nova video");

  $scope.voltar = function() {
    pageBack.back();
  };
});
