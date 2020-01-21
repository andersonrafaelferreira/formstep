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










(async function() {
  let arr = $scope.clientSideList;
  let arg = $scope.endereco.attributes.address_type;

  console.log(arr, arg);

  const reverse = await arr.filter(item => item.value === arg);
  $scope.data.clientSide = reverse[0].text;
})();

````
  $scope.data = {
    clientSide: $scope.video.platform
  };
````

### address page

````
EshowsController.controller("endereco", function(
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

  $scope.endereco = {};

  $scope.clientSideList = [
    { text: "Comercial", value: "business" },
    { text: "Cobrança", value: "billing" },
    { text: "Residêncial", value: "residential" }
  ];

  if ($scope.params !== "new") {
    $scope.endereco.attributes = {
      address: "rua 11a",
      complement: "humilde residência",
      address_type: "business"
    };
  } else {
    $scope.endereco.attributes = {
      address_type: null
    };
  }

  $scope.productType = function(item) {
    $scope.endereco.attributes.address_type = item;
  };

  $scope.changeType = function(item) {
    $scope.endereco.attributes.address_type = item.value;
  };

  $scope.update = function() {
    console.log("atualizar", $scope.endereco.attributes);
  };
  $scope.create = function() {
    console.log("criar", $scope.endereco.attributes);
    if (typeof $scope.endereco.attributes.address_type === "object") {
      let { address, complement } = $scope.endereco.attributes;
      let data = {
        address,
        complement,
        address_type: $scope.endereco.attributes.address_type.value
      };
      console.log("test", data);
    }
  };

  console.log("novo endereco");

  $scope.voltar = function() {
    pageBack.back();
  };
});

````
