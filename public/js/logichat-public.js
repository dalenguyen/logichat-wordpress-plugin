// Global callback
function onLogichatEvent(event) {
	if (event.type === "sdkLoaded") {
		const element = $logichat.V1.createElement("faq", {});
		element.mount("#logichat-faq-widget");
	}
}
